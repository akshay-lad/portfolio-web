<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link @php if (Request::url()!=url('home')){ echo 'collapsed'; } @endphp" href={{ url('home') }}>
      <i class="fa fa-th"></i>
      <span>Dashboard</span>
    </a>
  </li>
 
    <li><a class="nav-link collapsed" href="{{url('about')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>About</a></li>
    <li><a class="nav-link collapsed" href="{{url('admin/experience')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>Experience</a></li>
    <li><a class="nav-link collapsed" href="{{url('admin/skills')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>Skills</a></li>
    <li><a class="nav-link collapsed" href="{{url('admin/category')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>Category</a></li>
    <li><a class="nav-link collapsed" href="{{url('admin/portfolio')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>Portfolio</a></li>
    <li><a class="nav-link collapsed" href="{{url('admin/education')}}"> <i class="fa fa-question-circle-o" aria-hidden="true"></i>education</a></li>

</ul>

</aside><!-- End Sidebar-->