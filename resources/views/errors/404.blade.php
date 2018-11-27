
@extends('layouts.layout')
@section('title')404 @endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row center-block">
                <div class="col-lg-12">
                    <div class="col-lg-10">
                        <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
                        <br />
                        <h2>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</h2>
                        <h3><b>Or you could just press this neat little button:</b></h3><a href="{{route('user.list')}}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
                    </div>
                    <br />
                </div>
        </div>
    </div>
    </div>
@endsection
