<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ URL::route('dashboard.index') }}">Home
                <span class="sr-only">(current)</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('logout') }}">Logout</a>
        </li>
    </ul>
</div>