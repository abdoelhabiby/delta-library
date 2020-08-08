@extends('layouts.admin')

@section("title")
 | {{__("admin.admins")}} | {{__("admin.create")}}
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
                                <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}"> {{__("admin.admins")}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{__("admin.create")}}
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
                                        {{__("admin.create") . " " .__("admin.admin"). " " .__("admin.new")}} </h4>
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
                                        <form class="form" action="{{route("admin.admins.store")}}" method="POST"
                                              enctype="multipart/form-data">
                                              @csrf
                                            <div class="form-body">


                                                <div class="row">

                                                    <div class="form-group">
                                                         <label for="photo">{{__("admin.photo")}}</label>
                                                            <input type="file"  id="photo"
                                                                   class="form-control"
                                                                   name="photo">
                                                     @error('photo')
                                                         <p class="text-danger">{{$message}} </p>

                                                     @enderror

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{{__("admin.name")}}</label>
                                                            <input type="text"  id="name"
                                                                   class="form-control"
                                                                   value="{{old("name")}}"
                                                                   placeholder="{{__("admin.input") ." " . __("admin.name")}}"
                                                                   name="name">
                                                            @error('name')
                                                              <span class="text-danger">{{$message}} </span>

                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">{{__("admin.email")}}</label>
                                                            <input type="email"  id="email"
                                                                   class="form-control"
                                                                   value="{{old("email")}}"
                                                                   placeholder="{{__("admin.input") ." " . __("admin.email")}}"
                                                                   name="email">
                                                            @error('email')
                                                              <span class="text-danger">{{$message}} </span>

                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                   <div class="col-md-6">
                                                     <div class="form-group">
                                                       <label for="password">{{__("admin.password")}}</label>
                                                       <input type="password" name="password"
                                                              class="form-control"
                                                              placeholder="{{__('admin.input') . ' ' . __('admin.password')}}"
                                                          >
                                                            @error('password')
                                                              <span class="text-danger">{{$message}} </span>

                                                            @enderror
                                                     </div>
                                                   </div>
                                                    <div class="col-md-6">
                                                     <div class="form-group">
                                                       <label for="password-confirmation">{{__("admin.password_confirmation")}}</label>
                                                       <input type="password" name="password_confirmation"
                                                              class="form-control"
                                                              placeholder="{{__('admin.input') . ' ' . __('admin.password_confirmation')}}"
                                                          >
                                                             @error('password_confirmation')
                                                              <span class="text-danger">{{$message}} </span>

                                                            @enderror
                                                     </div>
                                                   </div>

                                                </div>



                                             <!-- start add permisiion -->
                                                <div class="form-group">


                                                    <strong class="mb-2">{{__('admin.permissions')}}</strong>
                                                  <?php
                                                    $modules = ['students','employees','categories','books'];
                                                    $permissions = ['create','read','edit','delete'];
                                                  ?>

                                                   <nav class="mt-2">
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                                     @foreach($modules as $index => $module)

                                                            <a class="nav-item nav-link {{$index == 0 ? 'active' : ''}}" id="nav-{{$module}}-tab" data-toggle="tab" href="#nav-{{$module}}" role="tab" aria-controls="nav-{{$module}}" aria-selected="true">{{__('admin.'.$module)}}</a>
                                                     @endforeach




                                                    </div>
                                                  </nav>
                                                  <div class="tab-content" id="nav-tabContent">

                                                     @foreach($modules as $index_module => $module)


                                                    <div class="tab-pane fade show {{$index_module == 0 ? 'active' : ''}}" id="nav-{{$module}}" role="tabpanel" aria-labelledby="nav-{{$module}}-tab">

                                                     @foreach($permissions as $index => $permission)
                                                            <input type="checkbox" id="{{$permission . '_' . $module}}"  value="{{$permission . '_' . $module}}" name="permissions[]">

                                                      <label class="checkbox-inline " for="{{$permission . '_' . $module}}">
                                                        {{ __('admin.'.$permission)}}
                                                      </label>

                                                     @endforeach

                                                    </div>

                                                     @endforeach

                                                  </div>

                                                    {{ $errors->first('permissions.*') }}


                                                </div>

                                                <!-- end add permisiion -->








                                            <div class="form-actions mt-2">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__("admin.back")}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__("admin.save")}}
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
