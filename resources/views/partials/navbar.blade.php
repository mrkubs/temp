<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
            <a class="navbar-brand fs-4" href="#">Waduh</a>
            <button class="btn px-1 py-0 open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i
                            class="fa-solid fa-user border-radius-lg px-2"></i>{{ auth()->user()->name }}</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
