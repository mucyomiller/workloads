        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="{{ route('dashboard.index')}}" class="logo-expanded">
                    <img src="{{asset('img/logo.png')}}" class="img img-responsive" >
                    <span class="nav-label" style="text-decoration:none;"></span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                <li class="active"><a href="#"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
                <li><a href="{{ route('dashboard.profile')}}"><i class="ion-person"></i> <span class="nav-label">Profile</span></a></li>
                <li class="has-submenu"><a href="#"><i class="ion-ios-book-outline"></i> <span class="nav-label">Workloads</span></a>
                <ul class="list-unstyled">
                <li><a href="#">list</a></li>
                </ul>
                </li>
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->