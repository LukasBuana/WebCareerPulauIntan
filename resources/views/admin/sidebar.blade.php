<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('/admincss/img/fadil.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Admin Pulau Intan</h1>
          <p>HRD</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}">
                <i class="icon-home"></i>Home
            </a>
        </li>
        <li class="{{ Request::is('admin/jobs*') ? 'active' : '' }}">
            <a href="{{ route('admin.jobs.index') }}">
                <i class="fa fa-briefcase"></i>Jobs
            </a>
        </li>
        <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
            <a href="{{ route('admin.news.index') }}">
                <i class="fa fa-newspaper"></i>News
            </a>
        </li>
        <li class="{{ Request::is('admin/service') ? 'active' : '' }}">
            <a href="{{ url('/admin/service')}}">
                <i class="fa fa-scissors"></i>Service
            </a>
        </li>
        <li class="{{ Request::is('admin/hairartist') ? 'active' : '' }}">
            <a href="{{ url('/admin/hairartist')}}">
                <i class="fa fa-user-tie"></i>HairArtist
            </a>
        </li>
        <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
            <a href="{{ url('/admin/user')}}">
                <i class="fa fa-user"></i>User
            </a>
        </li>
        <li class="{{ Request::is('admin/history') ? 'active' : '' }}">
            <a href="{{ url('/admin/history') }}">
                <i class="fa fa-book"></i>History
            </a>
        </li>
    </ul>
    
    </nav>