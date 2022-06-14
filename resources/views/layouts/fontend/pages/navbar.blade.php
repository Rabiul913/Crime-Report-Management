<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <!-- Brand -->
    <h1 class="logo me-auto me-lg-0"><a href="index.html" class="navbar-brand" style="font-size: 30px;">Crime Reporting System</a></h1>
    <!-- <a class="navbar-brand" href="#">Restaurantly</a> -->
  
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  
        <!-- Navbar links -->
       
            @if (Auth::check())
                    <div class="collapse navbar-collapse text-white" id="collapsibleNavbar" style="padding-left: 200px;">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Complaint<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="nav-item"><a href="{{ route('complaints.create') }}" class="nav-link">Create Complaint</a></li>
                                    <li class="nav-item"><a href="{{ url('pending-list') }}" class="nav-link">Pending List</a></li>
                                    <li class="nav-item"><a href="{{ url('running-list') }}" class="nav-link">Running List</a></li>
                                    <li class="nav-item"><a href="{{ url('rejected-list') }}" class="nav-link">Rejected List</a></li>
                                    <li class="divider"></li>
                                </ul>
                                </li>
                            </ul>
                    </div>

                    <div id="mySidepanel" class="sidepanel">
                            
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                                <a class="nav-link" href="#">User Name</a>
                                <a class="nav-link" href="#">Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><i
                                                                class="icon-mid bi bi-box-arrow-left me-2"></i> {{ __('Logout') }}</a>
                                                        
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                            
                    </div>
                    <button class="btn btn-secondary" onclick="openNav()">   
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                    </button> 
            @else
                    <div class="collapse navbar-collapse text-white" id="collapsibleNavbar" style="padding-left: 200px;">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                        <a class="nav-link" href="#home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="#about">About</a>
                                        </li>     
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact">Contacts</a>
                                            </li>
                                    </ul>
                    </div>
                    <button type="button" class="btn btn-outline-warning rounded-pill hidden-xs" data-toggle="modal" data-target="#Login">Login</button> &nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-warning rounded-pill hidden-xs" data-toggle="modal" data-target="#Register" >Registration</button>
            @endif



        
 
    


    
   

</nav>