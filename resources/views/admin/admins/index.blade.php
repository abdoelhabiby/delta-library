@extends("layouts.admin")

@section('title')

    | {{ __('admin.admins') }}

@endsection


@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('admin.admins') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">


                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @if ($admins && $admins->count() > 0)


                                            <div class="table-responsive">
                                                <table class="table table-bordered testdataTable" id="dataTable"
                                                    width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('admin.name') }}</th>
                                                            <th>{{ __('admin.email') }}</th>
                                                            <th>{{ __('admin.photo') }}</th>
                                                            <th>{{ __('admin.permissions') }}</th>
                                                            <th>{{ __('admin.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($admins as $admin)

                                                            <tr>
                                                                <td>{{ $admin->name }}</td>
                                                                <td>{{ $admin->email }}</td>
                                                                <td>
                                                                    <img src="{{ asset($admin->photo) }}" width="75px"
                                                                        height="75px">

                                                                </td>
                                                                <td>

                                                                    {{ $admin->getDirectPermissions()->pluck('name')->count() }}

                                                                </td>



                                                                <td>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">

                                                                        <a href="{{ route('admin.admins.show', $admin->id) }}"
                                                                            class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1">
                                                                            {{ __('admin.show') }}
                                                                        </a>

                                                                        <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                                            class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                            {{ __('admin.edit') }}
                                                                        </a>



                                                                        <button type="button" id="button_delete"
                                                                            data-action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                                            data-name="{{ $admin->name }}"
                                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                            {{ __('admin.delete') }}
                                                                        </button>



                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach






                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="text-center h4">{{ __('admin.not found data') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('admin.delete') }} <span class="name"></span>
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        @csrf()
                        @method("delete")

                        <input type="submit" value="{{ __('admin.delete') }}" class="btn btn-danger">
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
