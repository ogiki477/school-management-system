  <!--begin::Sidebar-->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image--> <img src="{{ url('assets/img/school_logo.jpg') }}"  class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">School M.S</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">


        @if(Auth::user()->is_role == 1)
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> 
                    <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard')  @else active @endif"> <i class="nav-icon bi bi-speedometer"></i> 
                    <p>Dashboard</p></a>
                </li>

                <li class="nav-item menu-open"> 
                    <a href="{{ url('admin/list')}}" class="nav-link @if(Request::segment(2) == 'list') @else active @endif"> <i class="nav-icon bi bi-person"></i> 
                    <p>Admin</p></a>
                </li>

                <li class="nav-item menu-open"> 
                    <a href="{{ url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class') @else active @endif"> <i class="nav-icon bi bi-people"></i> 
                    <p>Class</p></a>
                </li>

                <li class="nav-item menu-open"> 
                    <a href="{{ url('admin/subject/list')}}" class="nav-link @if(Request::segment(2) == 'class') @else active @endif"> <i class="nav-icon bi bi-book"></i> 
                    <p>Subject</p></a>
                </li>
                       
            </ul> <!--end::Sidebar Menu-->
        </nav>
        @endif


        @if(Auth::user()->is_role == 2)
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> 
                    <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @else active @endif  active"> <i class="nav-icon bi bi-speedometer"></i> 
                    <p>Dashboard</p></a>
                </li>   
                
                
                <li class="nav-item menu-open"> 
                    <a href="{{ url('teacher/list')}}" class="nav-link @if(Request::segment(2) == 'list') @else active @endif"> <i class="nav-icon bi bi-person"></i> 
                    <p>Teacher</p></a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
        @endif


        @if(Auth::user()->is_role == 3)
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> 
                    <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @else active @endif"> <i class="nav-icon bi bi-speedometer"></i> 
                    <p>Dashboard</p></a>
                </li> 
                
                
                <li class="nav-item menu-open"> 
                    <a href="{{ url('student/list')}}" class="nav-link @if(Request::segment(2) == 'list') @else active @endif"> <i class="nav-icon bi bi-person"></i> 
                    <p>Student</p></a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
        @endif


        @if(Auth::user()->is_role == 4)
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> 
                    <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') @else active @endif"> <i class="nav-icon bi bi-speedometer"></i> 
                    <p>Dashboard</p></a>
                </li>  
                
                
                <li class="nav-item menu-open"> 
                    <a href="{{ url('parent/list')}}" class="nav-link @if(Request::segment(2) == 'list') @else active @endif"> <i class="nav-icon bi bi-person"></i> 
                    <p>Parent</p></a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
        @endif


    </div> <!--end::Sidebar Wrapper-->
</aside> 
<!--end::Sidebar--> 