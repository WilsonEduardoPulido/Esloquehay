<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Gestion De Usuarios</h4>
        
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
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo Electronico</th>
                        <th>Direccion</th>
                        <th>Celular</th>
                        <th>Correo Electronico</th>
                        <td>Grado</td>
                        <th>Estado</th>
                       
                        <td>Acciones</td>

                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>

                            <td>{{ $row->lastname }}</td>
                            <td colspan="">{{ $row->email }}</td>

<td colspan="">{{ $row->direccion }}</td>
                            <td>{{ $row->celular }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->Grado }}</td>

                            @if ($row->Estado == 'Activo')
                                <td class=" text-white">
                                    <button title="Activo" class="btn btn-warning bi-check2-square btn-sm text-white">
                                    
                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button class="btn btn-danger text-white">
                                        {{ $row->Estado }}
                                    </button>


                                </td>
                            @endif


                         
                            <td class="d-flex justify-content-around">


                                <a  title="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"
                                    class=" bi bi-pencil-square btn-sm text-white btn btn-info  "
                                    wire:click="editarUsuario({{ $row->id }})"> </a>
                                <a title="Inactivar" class="btn btn-danger bi bi-trash3-fill btn-sm  text-white  "
                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="eliminarTemporalUsuario({{ $row->id }})"> </a>
                                <a   title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#verDetallesCategoria"
                                    class=" bi bi bi-eye-fill btn-sm text-white btn btn-warning  "
                                    wire:click="verDetallesUsuario({{ $row->id }})"> </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $usuarios->links() }}</div>
        </div>
    </div>





</div>