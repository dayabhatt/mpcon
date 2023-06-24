@extends('layouts.app')
 @section('content')
 <div class="container-fluid px-4">
        <!--<h1 class="mt-4">Dashboard</h1>-->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><h1>Dashboard {{$user->name}}</h1></li>
        </ol>
        
    </div>
@endsection