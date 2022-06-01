@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Periodo</td>
                <td>Fecha</td>
                <td>Fecha Apertura</td>
                <td>Hora Apertura</td>
                <td>Fecha Cierre</td>
                <td>Hora Cierre</td>
                <td>Observaciones</td>
                <td colspan="2">ACTION</td>
            </tr>
        </thead>
        <tbody>
            @foreach($eleccion as $elec)
            <tr>
                <td>{{$elec->id}}</td>
                <td>{{$elec->periodo}}</td>
                <td>{{$elec->fecha}}</td>
                <td>{{$elec->fechaapertura->format("d-m-Y") }} </td>
                <td>{{$elec->horaapertura}}</td>
                <td>{{$elec->fechacierre}}</td>
                
                <td >{{$elec->horacierre}}</td>
                
                <td>{{$elec->observaciones}}</td>
                <td><a href="{{ route('eleccion.edit', $elec->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('eleccion.destroy', $elec->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" 
                        onclick="return confirm('Esta seguro de borrar {{$elec->id}}')">Del</button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
@endsection