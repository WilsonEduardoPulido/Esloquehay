<div class="card  mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Gestiòn De Devoluciones</h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='keyWord' type="text" class="form-control  m-3" name="buscarPrestamo"
                id="buscarPrestamo" placeholder="Buscar Prestamo...">
        </div>



    </div>


    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Bibliotecario</th>
                        <th>Fecha Devolucion</th>

                        <th>Elemento o Libro Devuelto</th>
                        <th>Cantidad Entegada</th>
                        <th>Usuario </th>
                        <th>Novedades</th>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($devolucions as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->prestador->name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->elemento->nombre }}</td>
                            <td>{{ $row->Cantidad_Devuelta }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->Novedades}}</td>
                            <td >
                              


                            <a title="Inactivar" class="btn m-1 btn-danger bi bi-trash3-fill btn-sm  text-white "
                                onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                wire:click="inactivarDevolucion({{ $row->id }})"></a>
                            <a title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#VerDetallesPrestamo"
                                class=" bi bi bi-eye-fill m-1 btn-sm text-white btn btn-warning "
                                wire:click="verDetalleDevolucion({{ $row->id }})"> </a>

                            
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">No data Found </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $devolucions->links() }}</div>
        </div>
    </div>
</div>
