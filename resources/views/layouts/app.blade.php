<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title') &mdash; Inventaris</title>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --back-color: #e4e4e4;
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('components.alert')

                @yield('content')
            </div>
        </div>
    </div>

    @include('components.footer')
</body>

</html>
