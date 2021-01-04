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
            @yield('content')
        </main>
    
    </div>


    <header class="masthead   text-center">
        <div>
        <a href="grade" class="btn btn-primary">ADD GREDES</a><br><br>
        @error('name')
        <small>{{$message}}</small>    
          @enderror
        
        </div>
        <div >
            

            @foreach ($students as $i)

@if ($idit==$i->id)

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Department</th>
        <th scope="col">Grade</th>
        <th scope="col">Money</th>
        <th scope="col">Image</th>
        
        
      </tr>
    </thead>
    <tbody>

        
              
        <tr>  
            <th scope="row">{{$i->id}}</th>
            <td>{{$i->name}}</td>
            <td>{{$i->age}}</td>
            <td>{{$i->department}}</td>
            <td>{{$i->grade}}</td>
            <td>{{$i->money}}</td>
            <td><img src="{{  asset('admin_uploads/'.$i->image) }}" width="150px;" height="150px;"></td>
            
            
          </tr>
        </tbody>
        
 
  </table>
    
@endif

@endforeach

<br>



<table class="table">
<thead>
  <tr>
    
    <th scope="col">course</th>
    <th scope="col">Grade</th>
    
    
    
  </tr>
</thead>
@foreach ($grades as $i)

@if ($idit==$i->id)
<tbody>

    
          
    <tr>  
        <th scope="row">{{$i->course}}</th>
        <td>{{$i->grate}}</td>
        
        
      </tr>
    </tbody>
    @endif

@endforeach

</table>


</body>
</html>
