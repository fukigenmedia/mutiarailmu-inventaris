@php
    function checkRoute($name)
    {
        return Request::is("$name/*") || Request::is("$name") ? 'active text-warning' : '';
    }
@endphp

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
                        class="nav-link {{ checkRoute('kategori') }}"
                        href="{{ route('kategori.index') }}"
                    >Kategori</a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ checkRoute('ruangan') }}"
                        href="{{ route('ruangan.index') }}"
                    >Ruangan</a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ checkRoute('barang') }}"
                        href="{{ route('barang.index') }}"
                    >Barang</a>
                </li>
            </ul>

            <div class="d-flex">
                <div class="dropdown">
                    <button
                        class="btn dropdown-toggle text-white"
                        data-bs-toggle="dropdown"
                        type="button"
                        aria-expanded="false"
                    >
                        {{ auth()->user()->name }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                            >👤 Profil</a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                                onclick="toggleTheme(true)"
                            >🌗 Ganti Tema</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                                onclick="event.preventDefault();document.getElementById(`logout`).submit();"
                            >🛑 Logout</a>

                            <form
                                id="logout"
                                style="display: none"
                                action="{{ route('logout') }}"
                                method="post"
                            >
                                @csrf
                                @method('delete')
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
