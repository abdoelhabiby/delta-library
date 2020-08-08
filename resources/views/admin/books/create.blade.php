@extends('layouts.admin')

@section("title")
 | {{__("admin.books")}} | {{__("admin.create")}}
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
                                <li class="breadcrumb-item"><a href="{{route('admin.books.index')}}"> {{__("admin.categories")}} </a>
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
                                        {{__("admin.create") . " " .__("admin.book"). " " .__("admin.new")}} </h4>
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
                                        <form class="form" action="{{route("admin.books.store")}}" method="POST"
                                              enctype="multipart/form-data">
                                              @csrf
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="photo">{{__("admin.photo")}}</label>
                                                        <input type="file" name="photo" class="form-ontroll">
                                                        @error('photo')
                                                              <span class="text-danger">{{$message}} </span>

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
                                                        <label >{{__("admin.category")}}</label>
                                                        <select class="form-control" name="category_id">
                                                           @if(categoriesActive() && categoriesActive()->count() > 0)
                                                            <option  disabled selected>{{__("admin.choose category")}}</option>
                                                            @foreach(categoriesActive() as $index => $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                            @else
                                                                <option disabled selected>{{__("admin.please add category")}}</option>

                                                            @endif
                                                        </select>

                                                        @error('category_id')
                                                              <span class="text-danger">{{$message}} </span>

                                                        @enderror

                                                    </div>


                                                </div>



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="description">{{__("admin.description")}}</label>
                                                            <textarea   style="resize: none"  id="description"
                                                                   class="form-control"
                                                                rows="5
                                                                   placeholder="{{__("admin.input") ." " . __("admin.description")}}"
                                                                   name="description">{{old("description")}}</textarea>
                                                            @error('description')
                                                              <span class="text-danger">{{$message}} </span>

                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>




                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>{{__("admin.active")}}</p>
                                                            <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="active" id="yes" checked value="1">
                                                              <label class="form-check-label" for="yes">{{__("admin.enabled")}}</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-4">
                                                               <input class="form-check-input" type="radio" name="active" id="no" value="0">
                                                                <label class="form-check-label" for="no">{{__("admin.not_enabled")}}</label>
                                                            </div>
                                                         @error('active')
                                                            <br>
                                                            <span class="text-danger">{{$message}} </span>
                                                         @enderror

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__("admin.back")}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__("admin.save")}}
                                                </button>
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
