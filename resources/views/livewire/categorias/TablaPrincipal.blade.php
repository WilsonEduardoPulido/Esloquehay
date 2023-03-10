<div class=" mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla Gestion Generos Literarios Y categorias</h4>
        
    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='buscarCategoria' type="text" class="form-control  m-3" name="buscarCategoria"
                id="buscarCategoria" placeholder="Buscar Categorias...">
        </div>



    </div>
    <div class="card-body  " style="height:80%">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>


                        <th>Estado</th>

                        <td class="text-center">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->Tipo }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Activa')
                                <td class=" text-white">
                                    <button class="btn btn-warning bi bi bi-check2-square btn-sm text-white">
                                        
                                           

                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button class="btn btn-danger  bi bi-x-square btn-sm text-white">
                                       

                                    </button>


                                </td>
                            @endif



                            <td class="d-flex text-white justify-content-around">


                                <a data-bs-toggle="modal" data-bs-target="#actualizarCategoriaModal"
                                    class=" bi btn-sm bi-pencil-square text-white btn btn-info  m-1"
                                    wire:click="editarCategoria({{ $row->id }})"></a>

                                <a class="btn btn-danger btn-sm bi bi-trash3-fill  text-white "
                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="destroy({{ $row->id }})"></a>


                                <a data-bs-toggle="modal" data-bs-target="#verDetallesCategoria"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning btn-sm "
                                    wire:click="verDetallesCategoria({{ $row->id }})"></a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay Registros Para Mostrar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $categorias->links() }}</div>
        </div>
    </div>


  

</div>
<div>
    @include('partials.footer')

</div>
