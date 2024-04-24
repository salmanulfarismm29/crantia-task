<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100 " style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Crantia Task</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="{{ route('products.create') }}" class="nav-link active" aria-current="page">
                Add Product
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link active" aria-current="page">
                List Product
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>Admin</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
        </ul>
    </div>
</div>
