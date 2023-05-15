<div class="menu col-md-2 h-100 p-0 shadow">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100">
        <a href="{{ url('admin') }}"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">{{ config('app.name') }} <span class="fs-6 mx-1">v1.0</span></span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ url('admin') }}" class="nav-link {{ Route::is('admin.index') ? 'active' : 'link-dark' }}">
                    <i class="fa fa-home"></i><span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/posts') }}"
                   class="nav-link {{ Route::is('admin.posts') ? 'active' : 'link-dark' }}">
                    <i class="fa fa-newspaper"></i> Posts
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
               id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle fa-lg"></i><strong>{{ Auth::user()->user }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ url("admin/logout") }}">Sair</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="btn-toggle-menu justify-content-end top-0 mt-3 position-fixed">
    <button class="btn btn-secondary rounded-1"><i class="fa fa-bars m-0"></i></button>
</div>

<script type="module">
    $(".btn-toggle-menu").on("click", function(el) {
        $(".btn-toggle-menu > .btn > i").toggleClass("fa-bars fa-close rotate")
        $(".menu").toggleClass("mx-0")

    })
</script>
