<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla de gestion de Libros </h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='keyWord' type="text" class="form-control  m-3" name="search"
                id="search" placeholder="Buscar Libros">
        </div>



    </div>
    <div class="card-body  " style="height:80%">

        <div class="table-responsive">
            
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Edicion</th>s

                        <th>Estado</th>
                        <th>Cantidad</th>
                        <th>Categoria </th>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($libros as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->Nombre }}</td>
                            <td>{{ $row->Autor }}</td>
                            <td>{{ $row->Editorial }}</td>
                            <td>{{ $row->Edicion }}</td>

                            @if ($row->Estado == 'Disponible')
                                <td class=" text-white">
                                    <button title="Activo" class="btn btn-warning text-white bi bi-check2-square">
                                        
                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button title="Inactivo" class="btn btn-danger text-white bi bi-x-square">
                                
                                    </button>


                                </td>
                            @endif

                            <td>{{ $row->CantidadLibros }}</td>

                            <td>{{ $row->Nombre }}</td>
                            <td class="d-flex">


                                <a title="Editar" data-bs-toggle="modal" data-bs-target="#actualizarLibroModal"
                                    class=" bi bi-pencil-square text-white btn btn-info m-1 "
                                    wire:click="edit({{ $row->id }})"></a>
                                <a  title="Inactivar"  class="btn btn-danger bi bi-trash3-fill  text-white m-1 "
                                    
                                    wire:click="destroy({{ $row->id }})"></a>
                                <a  title="Ver" data-bs-toggle="modal" data-bs-target="#verlibro"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning m-1 "
                                    wire:click="edit({{ $row->id }})"> </a>
                                <a  title="RealizarPrestamo"  data-bs-target="#prestamoLibro"
                                    class=" bi bi-file-arrow-up text-white btn-sm  btn btn-danger m-1"
                                    wire:click="CargarDatosPrestamosLibros({{ $row->id }})">
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay
                                registros para mostrar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $libros->links() }}</div>
        </div>
    </div>





</div>
