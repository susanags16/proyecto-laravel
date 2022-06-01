@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Eleccion
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <!-- Ruta del controlador [Method POST como Argumento] -->
        <form method="post" action="{{ route('eleccion.update', $eleccion->id) }}">
            {{ csrf_field() }}
            @method('PUT')
            
            <div class="form-group">
                @csrf
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$eleccion->id }}" name="id" />
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="periodo">Periodo:</label>
                    <input type="text" id="periodo" class="form-control" value="{{$eleccion->periodo}}" name="periodo" />
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="fecha">Fechas:</label>
                    <input type="date" id="fecha" class="form-control" value ="{{ \Carbon\Carbon::parse($eleccion -> fecha) -> format('Y-m-d')}}" name="fecha"/>
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="fechaapertura">Fecha Apertura:</label>
                    
                    
                    
                    <input type="date" id="fechaapertura" class="form-control" value ="{{$eleccion -> fechaapertura-> format('Y-m-d')}}"name="fechaapertura" />
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="horaapertura">Hora Apertura:</label>
                    <input type="time" id="horaapertura" class="form-control" name="horaapertura" value="{{($eleccion-> horaapertura-> format('H:i'))}}"/>
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="fechacierre">Fecha Cierre:</label>
                    <input type="date" id="fechacierre" class="form-control" value ="{{ $eleccion -> fechacierre -> format('Y-m-d')}}" name="fechacierre" />
                    
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label for="horacierre">Hora Cierre:</label>
                    
                    <input type="datetime" id="horacierre" class="form-control" value =" {{$eleccion->horacierre -> format('H:i') }} " name="horacierre" />
                </div>
            </div>

            <div class="col-9">
                <div class="form-group mb-4">
                    <label for="observaciones">Observaciones:</label>
                    <input type="text" id="observaciones" class="form-control" value="{{$eleccion->observaciones}}" name="observaciones" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
          
        </form>
    </div>
</div>
@endsection