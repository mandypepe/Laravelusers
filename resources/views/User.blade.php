
@extends('layouts.layout')
@section('title')Usuarios @endsection
@section('content')
        <div class="content">
            <h1>Listado de Usuarios</h1>
            @if (count($user)>0)
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%">NOMBRE</th>
                        <th>CORREO</th>
                        <th>ADMIN</th>
                        <th>PROFECION</th>
                        <th width="13%">CREADO </th>
                        <th width="13%">ACTUALIZADO</th>
                        <th width="10%">ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td><a href="{{route('user.details',['id'=>$user->id])}}">{{$user->id}} </a></td>
                            <!-- url("/usuarioas/{$user->id}")    url('/usuarioas/'.$user->id)  action("UserController@detail_user",['id'=>$user->id])-->
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->is_admin) SI @else NO @endif</td>
                            <td>{{$user->profession_id}}</td>
                            <td>{{date('Y-m-d',strtotime($user->created_at))}}</td>
                            <td>{{date('Y-m-d',strtotime($user->updated_at))}}</td>
                            <td><form action="{{ route('user.delete', $user) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>ADMIN</th>
                        <th>PROFECION</th>
                        <th>CREADO</th>
                        <th>ACTUALIZADO</th>
                    </tr>
                    </tfoot>
                </table>
            @else
                <h1>No Hay USER </h1>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection