@extends('layouts.admin')

@section("title")
 | {{__("admin.profile")}} | {{__("admin.show")}}
@endsection
@section('content')

 <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__("admin.home")}} </a>
                                </li>


                                <li class="breadcrumb-item active">{{__("admin.profile")}}
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

                                        <div class="text-center">
                                            <img src="{{asset($profile->photo)}}" class="rounded-circle" height="250" width="250px">
                                        </div>

                                        <div class="user-data mt-3 ">

                                           <div class="row mb-2">
                                               <div class="col-md-6">
                                                   <strong>{{__("admin.name")}} : </strong>
                                                   {{$profile->name}}
                                               </div>
                                               <div class="col-md-6">
                                                   <strong>{{__("admin.email")}} : </strong>
                                                   {{$profile->email}}
                                               </div>

                                           </div>

                                          <hr>
                                           <div class="buttons-group">

                                                        <a href="{{route('admin.profile.edit')}}"
                                                                   class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 ml-3 mb-1">
                                                      {{__("admin.edit")}}
                                                    </a>

                                           </div>



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
