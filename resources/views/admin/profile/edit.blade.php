@extends('layouts.admin')

@section('title')
    | {{ __('admin.profile') }} | {{ __('admin.edit') }}
@endsection
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.home') }} </a>
                                </li>

                                <li class="breadcrumb-item active">{{ __('admin.edit') . ' ' . __("admin.profile") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
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
                                    <div class="card-body">
                                        <form class="form" action="{{ route('admin.profile.update') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="form-body">

                                                <div class="to-photo">
                                                    <div class="text-center ">
                                                        <img src="{{ asset($profile->photo) }}" class="thumbnail "
                                                            width="300" height="300" alt="صورة  ">
                                                    </div>
                                                </div>

                                                <div class="row">



                                                    <div class="form-group">
                                                        <label for="photo">{{ __('admin.photo') }}</label>
                                                        <input type="file" id="photo" class="form-control" name="photo">
                                                        @error('photo')
                                                        <p class="text-danger">{{ $message }} </p>

                                                        @enderror

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{ __('admin.name') }}</label>
                                                            <input type="text" id="name" class="form-control"
                                                                value="{{ $profile->name }}"
                                                                placeholder="{{ __('admin.input') . ' ' . __('admin.name') }}"
                                                                name="name">
                                                            @error('name')
                                                            <span class="text-danger">{{ $message }} </span>

                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">{{ __('admin.email') }}</label>
                                                            <input type="email" id="email" class="form-control"
                                                                value="{{ $profile->email }}"
                                                                placeholder="{{ __('admin.input') . ' ' . __('admin.email') }}"
                                                                name="email">
                                                            @error('email')
                                                            <span class="text-danger">{{ $message }} </span>

                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">{{ __('admin.password') }}</label>
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="{{ __('admin.input') . ' ' . __('admin.password') }}">
                                                            @error('password')
                                                            <span class="text-danger">{{ $message }} </span>

                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="password-confirmation">{{ __('admin.password_confirmation') }}</label>
                                                            <input type="password" name="password_confirmation"
                                                                class="form-control"
                                                                placeholder="{{ __('admin.input') . ' ' . __('admin.password_confirmation') }}">
                                                            @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }} </span>

                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                        <i class="ft-x"></i> {{ __('admin.back') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> {{ __('admin.save') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
