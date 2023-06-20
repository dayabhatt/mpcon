<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    {{-- <title>{{ config('app.name', 'Inventory Management') }}</title> --}}

    <title>@yield('title')</title>
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 
    <script src="https://use.fontawesome.com/7e850a5a48.js"></script>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
 
<!--Custom Scripts and Css-->
 
<link href="{{ asset('/sbadmin/css/styles.css') }}" rel="stylesheet" />
 
</head>
<body>
  
    <div id="app">
        <main class="py-4">
            @if(!Auth::check())
            @yield('content')
            @else
            @include('layouts.sidenav')
            @endif
        </main>
        
    </div>
 
<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
            {{-- <a class="btn btn-primary" href="{{ url('login') }}">Logout</a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
            </a> 
 
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>  --}}
        </div>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> --}}
{{-- <script src="{{ asset('/sbadmin/assets/demo/chart-area-demo.js') }}"></script> --}}
{{-- <script src="{{ asset('/sbadmin/assets/demo/chart-bar-demo.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('/sbadmin/js/datatables-simple-demo.js') }}"></script>
@yield('footerscript')
</body>
</html>