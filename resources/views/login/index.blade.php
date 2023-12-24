<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login &mdash; Inventaris</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-body d-flex flex-column min-vh-100">
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
            </div>
        </div>
    </nav>

    <div class="flex-grow-1 d-flex align-items-center container my-3">
        <form
            class="w-100"
            action="{{ route('login.store') }}"
            method="POST"
        >
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            @include('components.alert')

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="email"
                                >Email</label>

                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="password"
                                >Password</label>

                                <input
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    type="password"
                                >

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
