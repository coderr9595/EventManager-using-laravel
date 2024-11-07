<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Event Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/events')}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/my-events')}}">My Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(session('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ session('user.name') }}</a>
                    </li>
                    @if(session('user.role') === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/dashboard') }}">Admin Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
