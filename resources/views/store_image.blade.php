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

    <div class="container">    
        <br />
        <h3 align="center">Insert Image</h3>
          <br />
          @if($errors->any())
          <div class="alert alert-danger">
                 <ul>
                 @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                 @endforeach
                 </ul>
              </div>
          @endif
      
          @if(session()->has('success'))
           <div class="alert alert-success">
           {{ session()->get('success') }}
           </div>
          @endif
          <br />
      
          <div class="panel panel-default">
               <div class="panel-heading">
                   <h3 class="panel-title">User Form</h3>
               </div>
               <div class="panel-body">
               <br />
               <form method="post" action="{{ route('store.image') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <div class="row">
                 <label class="col-md-4" align="right">Enter Name</label>
                 <div class="col-md-8">
                  <input type="text" name="user_name" class="form-control" />
                 </div>
                </div>
               </div>
               <div class="form-group">
                <div class="row">
                 <label class="col-md-4" align="right">Select Profile Image</label>
                 <div class="col-md-8">
                  <input type="file" name="user_image" />
                 </div>
                </div>
               </div>
      
      
               <div class="form-group" align="center">
                <br />
                <br />
                <input type="submit" name="store_image" class="btn btn-primary" value="Save" />
               </div>
               </form>
            </div>
           </div>
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h3 class="panel-title">User Data</h3>
               </div>
               <div class="panel-body">
               <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                        <tr>
                           <th width="30%">Image</th>
                           <th width="70%">Name</th>
                        </tr>
                        @foreach($data as $row)
                        <tr>
                         <td>
                          <img src="store_image/fetch_image/{{ $row->id }}"  class="img-thumbnail" width="75" />
                         </td>
                         <td>{{ $row->user_name }}</td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $data->links() !!}
                   </div>
               </div>
           </div>
          </div>


</body>
</html>
