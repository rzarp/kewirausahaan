<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="{{ asset(Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }}
                        <span class="user-level">
                            @if(Auth::user()->role === 0)
                                User
                            @elseif(Auth::user()->role === 1)
                                Admin
                            @else
                                Undefined Role
                            @endif
                        </span>
                        {{-- <span class="caret"></span> --}}
                    </span>
                </a>
                {{-- <div class="clearfix"></div> --}}

                {{-- <div class="collapse in" id="collapseExample">
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
                </div> --}}
            </div>
        </div>
        <ul class="nav nav-primary">
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}" >
                <a  href="{{route('dashboard')}}" class="collapsed" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    <!-- <span class="caret"></span>  -->
                </a>
                @if(Auth::user()->role !== 0)
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
                @endif
            </li>

            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Indikator Dan Formula</h4>
            </li>


            <li class="nav-item">
                <a data-toggle="collapse" href="#email-nav">
                    <i class="far fa-envelope"></i>
                    <p>Data</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="email-nav">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('indikator.all')}}">
                                <span class="sub-item">Indikator</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sumber.all')}}">
                                <span class="sub-item">Sumber</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('formula.all')}}">
                                <span class="sub-item">Formula</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Rasio</h4>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#rasio">
                    <i class="far fa-envelope"></i>
                    <p>Rasio</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="rasio">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('rasio.all')}}">
                                <span class="sub-item">Rasio</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- <li class="nav-item {{ (request()->is('blok1/dashboard-blok1')) ? 'active' : '' }}">
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
            </li> --}}
        </ul>
    </div>
</div>
