<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla de Elementos</h4>
        
    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='keyWord' type="text" class="form-control  m-3" name="buscarCategoria"
                id="buscarCategoria" placeholder="Buscar Elementos...">
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
                    @forelse($elementos as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->cantidad }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Disponible')
                                <td class=" text-white">
                                    <button  title="Activo" class="btn btn-warning bi bi bi-check2-square btn-sm text-white">
                                        
                                    </button>


                                </td>
                            @else
                                <td class=" text-white" title="Inactivo">
                                    <button class="btn btn-danger bi bi-x-square btn-sm text-white">
                                        
                                    </button>


                                </td>
                            @endif


                            <td>{{ $row->nombre }}</td>
                            <td class="d-flex justify-content-around">


                                <button title="Editar" data-bs-toggle="modal"  data-bs-target="#actualizarNuevoElementoModal"
                                    class=" bi bi-pencil-square btn-sm text-white btn btn-info "
                                    wire:click="editarElemento({{ $row->id }})"> </button>


                                <a title="Inactivar" class="btn btn-danger bi bi-trash3-fill btn-sm  text-white "
                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="inactivar({{ $row->id }})"></a>
                                <a title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#verDetallesCategoria"
                                    class=" bi bi bi-eye-fill btn-sm text-white btn btn-warning "
                                    wire:click="verDetallesCategoria({{ $row->id }})"> </a>

                                    <a title="Realizar Prestamo Elemento" data-bs-toggle="modal" data-bs-target="#PrestamoElemento"
                                    class=" bi bi-file-arrow-up btn-sm text-dark btn btn-toolbar "
                                    wire:click="cargarDatosPrestamo({{ $row->id }})"> </a>
                                   

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $elementos->links() }}</div>
        </div>
    </div>





</div>
</div>

