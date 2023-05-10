<div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">{{ config('app.name') }} <span class="fs-6 mx-1">v1.0</span></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="fa fa-newspaper"></i> Posts
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user-circle fa-lg"></i><strong>{{ Auth::user()->user }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/admin/logout/">Sign out</a></li>
        </ul>
    </div>
</div>
