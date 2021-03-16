<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a href="{{ url('home') }}" class="nav-link">Home</a>
    </li>

    @auth
    @if(auth()->user()->role == "user")
    <li class="nav-item">
        <a href="{{ url('user-polls') }}" class="nav-link">Polls</a>
    </li>
    @else
    <li class="nav-item">
        <a href="{{ url('manage-polls') }}" class="nav-link">Manage Polls</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('manage-polls') }}" class="nav-link">Manage Divisions</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('manage-polls') }}" class="nav-link">Manage User</a>
    </li>
    @endif
    @endauth

</ul>