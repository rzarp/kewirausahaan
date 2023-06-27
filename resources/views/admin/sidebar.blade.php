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

                <li class="nav-item">
                <a data-toggle="collapse" href="#charts">
                    <i class="far fa-chart-bar"></i>
                    <p>User</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav nav-collapse">
                        <li class="{{ (request()->is('user/user-insert')) ? 'active' : '' }}">
                            <a href="{{route('user.insert')}}">
                                <span class="sub-item">User</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sub-item">Sparkline</span>
                            </a>
                        </li>
                    </ul>
                </div>
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


            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Data Master</h4>
            </li>

            
         
           
           
            <li class="nav-item">
                <a data-toggle="collapse" href="#charts">
                    <i class="far fa-chart-bar"></i>
                    <p>Charts</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="charts/charts.html">
                                <span class="sub-item">Chart Js</span>
                            </a>
                        </li>
                        <li>
                            <a href="charts/sparkline.html">
                                <span class="sub-item">Sparkline</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           
            <li class="nav-item">
                <a href="{{route('excel.import')}}">
                    <i class="far fa-question-circle"></i>
                    <p>Faqs</p>
                    <!-- <span class="badge badge-count">6</span> -->
                </a>
            </li>

           


          
        </ul>
    </div>
</div>