<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }}
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-primary">
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}" >
                <a  href="{{route('dashboard')}}" class="collapsed" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    <!-- <span class="caret"></span>  -->
                </a>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Master</h4>
                </li>

                <li class="nav-item {{ (request()->is('user/user-insert')) ? 'active' : '' }}" >
                    <a  href="{{route('user.insert')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                        <!-- <span class="caret"></span>  -->
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('user/trash/user')) ? 'active' : '' }}" >
                    <a  href="{{route('trash.user')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-trash"></i>
                        <p>Restore</p>
                        <!-- <span class="caret"></span>  -->
                    </a>
                </li>
            </li>

            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Blok I</h4>
            </li>


            <li class="nav-item {{ (request()->is('blok1/dashboard-blok1')) ? 'active' : '' }}">
                <a href="{{route('pengenalan')}}">
                    <i class="far fa-question-circle"></i>
                    <p>Pengenalan Tempat Usaha</p>
                    <!-- <span class="badge badge-count">6</span>  -->
                </a>
            </li>
            </li>
            <li class="nav-item {{ (request()->is('excel/import-excel')) ? 'active' : '' }}">
                <a href="{{route('excel.import')}}">
                    <i class="far fa-question-circle"></i>
                    <p>Faqs</p>
                    <!-- <span class="badge badge-count">6</span> -->
                </a>
            </li>
        </ul>
    </div>
</div>