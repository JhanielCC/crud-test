@extends('layouts.plantillabase')

<!-- Para data tables CSS -->
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
@endsection

@section('contenido')
    
    <a class="btn btn-primary mb-3" href="articulos/create">CREAR</a>

    <table id="articulos" class="table table-striped" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id}}</td>
                    <td>{{$articulo->codigo}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->cantidad}}</td>
                    <td>{{$articulo->precio}}</td>
                    <td>
                        <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                            <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>         
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>          
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script >
        $(document).ready(function () {
            $('#articulos').DataTable({
                "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]]
            });
        });
    </script>
@endsection     
@endsection