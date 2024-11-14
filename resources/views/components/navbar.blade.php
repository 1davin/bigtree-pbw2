<nav class="navbar navbar-expand-md navbar-light bg-white shadow" x-data="{ isOpen: false }">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/logo_liburin.png') }}" alt="Your Company" height="48" width="48">
        </a>
      

        <ul class="navbar-nav me-auto d-flex flex-row gap-3"> <!-- Added gap-3 for spacing -->
            <li class="nav-item px-2"> <!-- Added px-2 for additional padding -->
                <a class="nav-link text-primary fs-6" href="/trip">Open Trip</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link text-primary fs-6" href="/beranda">Beranda</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link text-primary fs-6" href="/about">About</a>
            </li>
        </ul>
    </div>
</nav>
