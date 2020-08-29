@extends("layouts.admin")

@section("content")


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered testdataTable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{__("admin.name")}}</th>
                      <th>{{__("admin.email")}}</th>
                      <th>{{__("admin.photo")}}</th>
                      <th>{{__("admin.permissions")}}</th>
                     <th>{{__("admin.action")}}</th>
                    </tr>
                  </thead>

                  <tbody>

                   @foreach($employees as $employee)

                                                    <tr>
                                                        <td>{{$employee->name}}</td>
                                                        <td>{{$employee->email}}</td>
                                                        <td>
                                                            <img src="{{asset($employee->photo)}}" width="75px" height="75px">

                                                        </td>
                                                        <td>

                                                               {{ $employee->getDirectPermissions()->pluck('name')->count() }}

                                                        </td>



                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">

                                                                <a href="{{route("admin.employees.show",$employee->id)}}"
                                                                   class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1">
                                                                   {{__("admin.show")}}
                                                                </a>

                                                             @if(admin()->can('edit_employees'))
                                                                <a href="{{route("admin.employees.edit",$employee->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                   {{__("admin.edit")}}
                                                                </a>
                                                             @else
                                                             <button class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 disabled">{{__("admin.edit")}}</button>
                                                             @endif



                                                            @if(admin()->can('delete_employees'))
                                                                <button type="button"
                                                                        id="button_delete"
                                                                        data-action="{{route("admin.employees.destroy",$employee->id)}}"
                                                                        data-name="{{$employee->name}}"
                                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                        >
                                                                    {{__("admin.delete")}}
                                                                </button>
                                                             @else
                                                             <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 disabled">{{__("admin.delete")}}</button>
                                                             @endif




                                                            </div>
                                                        </td>
                                                    </tr>
                                            @endforeach


                  </tbody>
                </table>
              </div>
        </div>




    </div>



@endsection
