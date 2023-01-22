<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Restaurar  Elementos</h4>
        
    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='buscarCategoria' type="text" class="form-control  m-3" name="buscarCategoria"
                id="buscarCategoria" placeholder="Buscar Categorias...">
        </div>



    </div>
    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>


                        <th>Estado</th>
                        <td>Categoria</td>
                        <td>Acciones</td>

                    </tr>
                </thead>
                <tbody>
                    @forelse($consulta as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->cantidad }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Activa')
                                <td class=" text-white">
                                    <button class="btn btn-warning text-white">
                                        {{ $row->Estado }}
                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button class="btn btn-danger text-white">
                                        {{ $row->Estado }}
                                    </button>


                                </td>
                            @endif


                            <td>{{ $row->categoria->nombre }}</td>
                            <td class="d-flex">


                                <a data-bs-toggle="modal"
                                    class=" bi bi-pencil-square text-white btn-sm btn btn-warning "
                                    wire:click="restaurarElemento({{ $row->id }})">Restaurar </a>
                                <a class="btn btn-danger bi bi-trash3-fill btn-small text-white "
                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="eliminarElementoTotalMente({{ $row->id }})">Eliminar </a>
                                

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay Registros Inactivados </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $consulta->links() }}</div>
        </div>
    </div>





</div>
