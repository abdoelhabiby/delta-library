 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Libraray 2</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{(request()->segment(1) == "dashboard" && request()->segment(2) == null)  ? "active" : ''}}">
        <a class="nav-link" href="{{route("admin.home")}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{__("admin.home")}}</span></a>

      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

 <!-- -- -------------start admins  ----------- --!>
  @if(admin()->hasRole('super_admin'))
      <!-- Nav Item - admins Collapse Menu -->
      <li class="nav-item  {{request()->segment(2) == "admins" ? "active" : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admins" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{__("admin.admins")}}</span>
          <span class="badge badge badge-info badge-pill ">{{App\Models\Admin\Admin::role('admin')->count()}}</span>


        </a>
        <div id="admins" class="collapse {{request()->segment(2) == "admins" ? "show" : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.admins.index")}}" style="background:#ecedf7">{{__("admin.show_all")}}</a>
            <a class="collapse-item" href="{{route("admin.admins.create")}}">{{__("admin.create")}}</a>
          </div>
        </div>
      </li>

         <!-- Divider -->
      <hr class="sidebar-divider my-0">
   @endif

 <!-- -- -------------end admins  ----------- --!>

 <!-- -- -------------start employees  ----------- --!>
  @if(admin()->hasPermissionTo('read_employees'))
      <!-- Nav Item - employees Collapse Menu -->
      <li class="nav-item  {{request()->segment(2) == "employees" ? "active" : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employees" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{__("admin.employees")}}</span>
          <span class="badge badge badge-info badge-pill ">{{App\Models\Admin\Admin::role('employees')->count()}}</span>


        </a>
        <div id="employees" class="collapse {{request()->segment(2) == "employees" ? "show" : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.employees.index")}}" style="background:#ecedf7">{{__("admin.show_all")}}</a>
           @if(admin()->can('create_employees'))
            <a class="collapse-item" href="{{route("admin.employees.create")}}">{{__("admin.create")}}</a>
            @endif
          </div>
        </div>
      </li>

         <!-- Divider -->
      <hr class="sidebar-divider my-0">
   @endif

 <!-- -- -------------end employees  ----------- --!>

 <!-- -- -------------start students  ----------- --!>
  @if(admin()->hasPermissionTo('read_students'))
      <!-- Nav Item - students Collapse Menu -->
      <li class="nav-item  {{request()->segment(2) == "students" ? "active" : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#students" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>{{__("admin.students")}}</span>
          <span class="badge badge badge-info badge-pill ">{{App\Models\Admin\Student::count()}}</span>


        </a>
        <div id="students" class="collapse {{request()->segment(2) == "students" ? "show" : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.students.index")}}" style="background:#ecedf7">{{__("admin.show_all")}}</a>
           @if(admin()->can('create_students'))
            <a class="collapse-item" href="{{route("admin.students.create")}}">{{__("admin.create")}}</a>
            @endif
          </div>
        </div>
      </li>

         <!-- Divider -->
      <hr class="sidebar-divider my-0">
   @endif

 <!-- -- -------------end employees  ----------- --!>

 <!-- -- -------------start categories  ----------- --!>
  @if(admin()->hasPermissionTo('read_categories'))
      <!-- Nav Item - categories Collapse Menu -->
      <li class="nav-item  {{request()->segment(2) == "categories" ? "active" : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>{{__("admin.categories")}}</span>
          <span class="badge badge badge-info badge-pill ">{{App\Models\Admin\Category::count()}}</span>


        </a>
        <div id="categories" class="collapse {{request()->segment(2) == "categories" ? "show" : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.categories.index")}}" style="background:#ecedf7">{{__("admin.show_all")}}</a>
           @if(admin()->can('create_categories'))
            <a class="collapse-item" href="{{route("admin.categories.create")}}">{{__("admin.create")}}</a>
           @endif
        </div>
        </div>
      </li>

         <!-- Divider -->
      <hr class="sidebar-divider my-0">
   @endif

 <!-- -- -------------end categories  ----------- --!>

{{--  -------------------start books----------------------------------  --}}
  @if(admin()->hasPermissionTo('read_books'))

    <!-- Nav Item - books Collapse Menu -->
      <li class="nav-item  {{request()->segment(2) == "books" ? "active" : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#books" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>{{__("admin.books")}}</span>
          <span class="badge badge badge-info badge-pill ">{{App\Models\Admin\Book::count()}}</span>


        </a>
        <div id="books" class="collapse {{request()->segment(2) == "books" ? "show" : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route("admin.books.index")}}" style="background:#ecedf7">{{__("admin.show_all")}}</a>
           @if(admin()->can('create_books'))
            <a class="collapse-item" href="{{route("admin.books.create")}}">{{__("admin.create")}}</a>
           @endif
        </div>
        </div>
      </li>

         <!-- Divider -->
      <hr class="sidebar-divider my-0">
@endif
{{--  -------------------end books----------------------------------  --}}




      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



    </ul>
