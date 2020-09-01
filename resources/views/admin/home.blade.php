@extends("layouts.admin")

@section('content')


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('admin.dashboard') }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            @if (admin()->hasRole('super_admin'))

                <!-- admins -->
                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.admins.index') }}" style="text-decoration: none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ __('admin.admins') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admins }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif

            <!-- employees -->
            @if (admin()->hasPermissionTo('read_employees'))


                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.employees.index') }}" style="text-decoration: none">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            {{ __('admin.employees') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employees }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif


            <!-- read_students -->
            @if (admin()->hasPermissionTo('read_students'))

                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.students.index') }}" style="text-decoration: none">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            {{ __('admin.students') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif

            <!-- categories -->
            @if (admin()->hasPermissionTo('read_categories'))

                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.categories.index') }}" style="text-decoration: none">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            {{ __('admin.categories') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif


            <!-- books -->
            @if (admin()->hasPermissionTo('read_books'))

                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.books.index') }}" style="text-decoration: none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ __('admin.books') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $books }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif

            <!-- reservations -->
            @if (admin()->hasPermissionTo('read_reservations'))

                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.reservations.index') }}" style="text-decoration: none">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            {{ __('admin.reservations') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reservations }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list-alt  fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @endif


            <!-- contacts -->

                <div class="col-xl-3 col-md-6 mb-4">

                    <a href="{{ route('admin.contactUs.index') }}" style="text-decoration: none">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            {{ __('admin.contactUs') }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $contacts }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-phone  fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>









        </div>



    @endsection

