<!DOCTYPE html>
<html
    data-bs-theme="light"
    lang="en"
>

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title') &mdash; Inventaris</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-body d-flex flex-column min-vh-100">
    @include('components.navbar')

    <div class="container my-3">
        @include('components.alert')

        @yield('content')
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function hapusData(name, id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.preventDefault();
                document.getElementById(`hapus-${name}-${id}`).submit();
            }
        }

        function toggle(id) {
            let element = document.getElementById(id);

            if (element.style.display === 'none') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
</body>

</html>
