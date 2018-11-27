@extends('layouts.layout')
@section('title',"Detalles del Usuarios: {$user->name}")
@section('content')
    <h1>Detalles </h1>

    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Nombre:</b> {{$user->name}} </h4>
            </div>
            <div class="card-body">

                <ul class="list-unstyled mt-3 mb-4">
                    <li><h3 class="card-title pricing-card-title"> {{$user->email}} </h3></li>
                    <li><h3 class="card-title pricing-card-title"> {{$user->profession_id}} </h3></li>
                    <li><h3 class="card-title pricing-card-title"> {{date('Y-m-d',strtotime($user->created_at))}} </h3></li>
                    <li><h3 class="card-title pricing-card-title">@if($user->is_admin) SI @else NO @endif</h3></li>
                </ul>

                <!-- url()->previous()  url('/lista/')  action('UserController@index') -->
                <a class="btn-primary" href="{{route('user.list')}}">Retornar</a>
            </div>
        </div>


    </div>
@endsection