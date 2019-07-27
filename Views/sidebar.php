<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="<?=$this->base_path?>">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Route Ticket</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tickets" aria-expanded="false" aria-controls="tickets">
                        <i class="mdi mdi-bell"></i>
                        <span class="nav-text">Tickety</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="tickets" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>ticket">
                                    <span class="nav-text">Wszystkie tickety</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>ticket/unsolved">
                                    <span class="nav-text">Nierozwiązane</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#suggestions" aria-expanded="false" aria-controls="bugs">
                        <i class="mdi mdi-folder-star-outline"></i>
                        <span class="nav-text">Propozycje</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="suggestions" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>suggestions">
                                    <span class="nav-text">Wszystkie błędy</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>suggestions/unsolved">
                                    <span class="nav-text">Nierozwiązane</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <?php if($this->logged):?>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#settings" aria-expanded="false" aria-controls="settings">
                        <i class="mdi mdi-cogs"></i>
                        <span class="nav-text">Ustawienia</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="settings" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>settings/main">
                                    <span class="nav-text">Ustawienia ogólne</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>settings/permissions">
                                    <span class="nav-text">Permisje</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="<?=$this->base_path?>user/all">
                                    <span class="nav-text">Użytkownicy</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <?php endif?>
            </ul>
        </div>
    </div>
</aside>