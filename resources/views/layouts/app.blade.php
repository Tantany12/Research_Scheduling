<body>
    <div id="app">
        <div class="container">  
            <div class="row justify-content-center">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <img src="UM.png" alt="logo" class="rounded-circle mx-auto d-block" style="width:15%;">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/home')}}">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/seeSchedule')}}">Schedule</a>
                            </li>
                    </div>

                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                
                    <form class="form-inline my-2" method="get" action="{{url('/searchData')}}">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search your title" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>