@extends('layouts.layout')
@section('title',"Crear  Usuarios")
@section('content')

    <div class="container">
        <div class="py-5 text-center">
           <h2>Creando Usuarios</h2>
            </div>
        @if ($errors->any())

            <div class="alert alert-danger">
                Por favor rectifique:
               {{-- <ul>
               {{dd($errors)}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                 --}}
            </div>
        @endif
        <div class="row">

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Datos personales</h4>
                <form class="needs-validation" action="{{route('user.create')}}" method="post">
                    {!! csrf_field()  !!}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="" value="{{old('name')}}"  name="name">

                                @if ($errors->has('name'))
                                <br><div class="alert alert-danger" role="alert"> {{$errors->first('name')}}</div>
                                @endif

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" value="{{old('password')}}">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{old('email')}}">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>

@endsection