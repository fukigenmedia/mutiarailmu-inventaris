<nav
    class="navbar navbar-expand-lg bg-dark border-bottom border-body"
    data-bs-theme="dark"
>
    <div class="container">
        <button
            class="navbar-toggler"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-toogle"
            type="button"
            aria-controls="navbar-toogle"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="navbar-collapse collapse"
            id="navbar-toogle"
        >
            <a
                class="navbar-brand h1 mb-0"
                href="{{ url('/') }}"
            >Inventaris</a>

            <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('kategori.index') }}"
                    >Kategori</a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('ruangan.index') }}"
                    >Ruangan</a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('barang.index') }}"
                    >Barang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
