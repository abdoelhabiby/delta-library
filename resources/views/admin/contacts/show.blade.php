@extends('layouts.admin')

@section('title')
    | {{ __('admin.contactUs') }} | {{ __('admin.show') }}
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.contactUs.index') }}">
                                        {{ __('admin.contactUs') }} </a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('admin.show') }}
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
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
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


                                        <div class="user-data mt-3 ">

                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <strong>{{ __('admin.name') }} : </strong>
                                                    {{ $contact->name }}
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>{{ __('admin.email') }} : </strong>
                                                    {{ $contact->email }}
                                                </div>

                                            </div>
                                            <hr>

                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>{{ __('admin.message') }} : </strong>
                                                    <p>
                                                        {{ $contact->message }}
                                                    </p>
                                                </div>
                                            </div>

                                            <hr>

                                            {{-- ---------------last response
                                            ---------------------- --}}
                                            @if ($contact->response)
                                                <div class="last-response">
                                                    <h5>الرد السابق</h5>
                                                    <p>{{$contact->response}}</p>

                                                </div>

                                                <hr>

                                            @endif

                                            {{-- ---------------end last response
                                            ---------------------- --}}


                                            {{-- ---------------response
                                            ---------------------- --}}

                                            <div class="response">
                                                <h5> {{ __('admin.response_to') }} : {{ $contact->name }}</h5>
                                                <form method="post"
                                                    action="{{ route('admin.contactUs.response', $contact->id) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="response" id="" cols="30"
                                                            rows="5"></textarea>
                                                        @error('response')
                                                        <p>{{ $message }}</p>

                                                        @enderror
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('admin.create') }}</button>
                                                </form>
                                            </div>

                                            {{-- ---------------end response
                                            ------------------ --}}



                                        </div>

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
