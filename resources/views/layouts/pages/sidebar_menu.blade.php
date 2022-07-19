<div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
       
       
                        
            {{-- @canany(['criminal-create','criminal-edit','criminal-list','criminal-delete','crime-create','crime-edit','crime-list','crime-delete'])
            <li class="sidebar-title">Crime Sections</li> 
            @canany(['user-create','user-edit','user-list','user-delete'])    
            <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Criminals List</span>
                            </a>
            </li>
            @endcanany
            @canany(['user-create','user-edit','user-list','user-delete']) 
            <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Crimes List</span>
                            </a>
            </li>
            @endcanany
            @endcanany --}}

            @canany(['complaint-create','complaint-edit','complaint-list','complaint-delete','complaint-type-create','complaint-type-edit','complaint-type-list','complaint-type-delete','inverstigation-create','inverstigation-edit','inverstigation-list','inverstigation-delete','attestor-create','attestor-edit','attestor-list','attestor-delete',])  
            <li class="sidebar-title">Complaint Sections</li>  
            @canany(['complaint-type-create','complaint-type-edit','complaint-type-list','complaint-type-delete'])      
            <li class="sidebar-item  ">
                            <a href="{{ route('complaint_types.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Complaint Types List</span>
                            </a>
            </li>
            @endcanany
            @canany(['complaint-create','complaint-edit','complaint-list','complaint-delete'])      
            <li class="sidebar-item  ">
                            <a href="{{ route('complaints.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Complaints List</span>
                            </a>
            </li>
            @endcanany
            @canany(['inverstigation-create','inverstigation-edit','inverstigation-list','inverstigation-delete'])      
            <li class="sidebar-item  ">
                            <a href="{{ route('investigations.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Investigations List</span>
                            </a>
            </li>
            @endcanany
            @canany(['attestor-create','attestor-edit','attestor-list','attestor-delete'])      
            <li class="sidebar-item  ">
                            <a href="{{ route('attestors.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Attestors List</span>
                            </a>
            </li>
            @endcanany
            @endcanany

            <!-- <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Complaint Sections</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('complaint_types.index') }}">Complaint Types List</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('complaints.index') }}">Complaints List</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('investigations.index') }}">Investigations List</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('attestors.index') }}">Attestors List</a>
                    </li>
                </ul>
            </li> -->

            

            @canany(['user-create','user-edit','user-list','user-delete','role-create','role-edit','role-list','role-delete','permission-create','permission-edit','permission-list','permission-delete','district-create','district-edit','district-list','district-delete','police-station-create','police-station-edit','police-station-list','police-station-delete',])
            <li class="sidebar-title">System Sections</li>   
            @canany(['user-create','user-edit','user-list','user-delete']) 
            <li class="sidebar-item  ">
                            <a href="{{ route('users.index') }}" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>Users List</span>
                            </a>
            </li>
            @endcanany
            @canany(['role-create','role-edit','role-list','role-delete'])
            <li class="sidebar-item  ">
                            <a href="{{ route('roles.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Roles List</span>
                            </a>
            </li>
            @endcanany
            @canany(['permission-create','permission-edit','permission-list','permission-delete'])
            <li class="sidebar-item  ">
                            <a href="{{ route('permissions.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Permissions List</span>
                            </a>
            </li>
            @endcanany
            @canany(['district-create','district-edit','district-list','district-delete'])
            <li class="sidebar-item  ">
                            <a href="{{ route('districts.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Districts List</span>
                            </a>
            </li>
            @endcanany
            @canany(['police-station-create','police-station-edit','police-station-list','police-station-delete'])
            <li class="sidebar-item  ">
                            <a href="{{ route('police_stations.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Police Stations List</span>
                            </a>
            </li>
            @endcanany
            @endcanany

           

                    </ul>
                </div>