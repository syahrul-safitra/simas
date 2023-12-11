<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Master</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('/') }}" class="nav-item nav-link"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ url('dashboard/suratmasuk') }}"
                class="nav-item nav-link {{ (Request::is('dashboard/suratmasuk*') ? 'active' : '' || Request::is('dashboard/diteruskan*') || Request::is('dashboard/disposisi*')) ? 'active' : '' }}"><i
                    class="fa fa-envelope me-2"></i>Surat Masuk</a>
            <a href="form.html" class="nav-item nav-link {{ Request::is('dashboard/suratkeluar*') ? 'active' : '' }}"><i
                    class="fa fa-reply me-2"></i>Surat Keluar</a>
            <a href="{{ url('/dashboard/instansi') }}"
                class="nav-item nav-link {{ Request::is('dashboard/instansi*') ? 'active' : '' }}"><i
                    class="fa fa-building me-2"></i>Instansi</a>
    </nav>
</div>
