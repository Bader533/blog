<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    @include('include')
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{-- @yield('content') --}}
        </main>
    </div>

    <center>
    <h1>ADD NEW STUDENT</h1></center>
    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
      @csrf
      <div style="margin-top: 100px;margin-bottom: 100px;margin-right: 150px;margin-left: 80px;">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control"  name="name">
          @error('name')
          <small>{{$message}}</small>    
            @enderror
        </div>
    
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Age</label>
          <input type="number" class="form-control"  name="age">
          @error('name')
          <small>{{$message}}</small>    
            @enderror
        </div>
    
    
    
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Department</label>
          <input type="text" class="form-control"  name="department">
          @error('name')
          <small>{{$message}}</small>    
            @enderror
        </div>
    
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">grade</label>
          <input type="number" class="form-control"  name="grade">
          @error('name')
          <small>{{$message}}</small>    
            @enderror
        </div>
    
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Money</label>
          <input type="number" class="form-control"  name="money">
          @error('name')
          <small>{{$message}}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control"  name="image">
            @error('image')
            <small>{{$message}}</small>    
              @enderror
          </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
      </form>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    

</body>
</html>
