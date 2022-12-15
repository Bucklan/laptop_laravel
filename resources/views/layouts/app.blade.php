<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @can('viewAny',App\Models\User::class)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm.users.index')}}">{{__('messages.Admin page')}}</a>
                            </li>
                        @endcan
                            @can('viewformod',App\Models\User::class)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adm.categories.index')}}">{{__('messages.Admin page')}}</a>
                            </li>
                        @endcan
                        @can('create', App\Models\Laptop::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('laptops.create') }}">{{__('messages.создать') }}</a>
                        </li>
                        @endcan
                        @isset($categories)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('categories')}}">{{ __('messages.все ноутбуки') }}</a>
                            </li>
                            @foreach($categories  as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('laptops.category', $cat->id)}}">{{$cat->{'name_'.app()->getLocale()} }}</a>
                                </li>
                            @endforeach
                        @endisset
                          {{-- //nov--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">{{__('messages.корзина') }}</a>
                        </li>
                        @endauth
                        @guest
                            @if (Route::has('login.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.form') }}">{{ __('messages.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.form') }}">{{ __('messages.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                             {{--nov--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{config('app.languages')[app()->getLocale()]}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach(config('app.languages') as $ln => $lang)
                                <a class="dropdown-item" href="{{route('switch.lang', $ln) }}">
                                   {{$lang}}
                                </a>
                                @endforeach
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
