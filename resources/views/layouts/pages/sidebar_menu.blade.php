<div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
            @canany(['criminal-create','criminal-edit','criminal-list','criminal-delete','crime-create','crime-edit','crime-list','crime-delete'])
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hourglass-top"></i>
                                <span>Crime Sections</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Criminals List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Crimes List</a>
                                </li>
                            </ul>
                        </li>
            @endcanany


            <li class="sidebar-item  has-sub">
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
                    
                </ul>
            </li>

            

            @canany(['user-create','user-edit','user-list','user-delete','role-create','role-edit','role-list','role-delete','permission-create','permission-edit','permission-list','permission-delete'])
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>System Sections</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('users.index') }}">Users List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('roles.index') }}">Roles List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('permissions.index') }}">Permissions List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('districts.index') }}">Districts List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('police_stations.index') }}">Police Stations List</a>
                                </li>
                            </ul>
                        </li>
            @endcanany

           

                    </ul>
                </div>