<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="icon" href="{{Vite::asset('resources/images/logos/Logo.png')}}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
@include('partials.header')

    <main class="">
        <div class="container">
            <section class="title my-5">
                <h1>
                    @yield('title')
                </h1>
            </section>
            @yield('content')
        </div>
    </main>

@include('partials.footer')
</body>

</html>
