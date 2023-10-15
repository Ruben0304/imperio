@extends('admin.template')
@section('contenido')
    {{-- Eliminar Productos --}}
    @if (isset($error))
    @endif


    <form action="{{ route('cambio_cup') }}" method="POST">
        @csrf
        @method('put')
        <div class="formulario">

            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Valor</label>
                <input class="form-control" type="text" name="valor" required placeholder="Valor actual {{$cup}}">
            </div>
        </div>



        <button type="submit" class="btn bg-gradient-success">Cambiar</button>

      

    </form>
@endsection
