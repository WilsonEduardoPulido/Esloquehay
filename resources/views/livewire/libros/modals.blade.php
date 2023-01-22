<div>
    <!-- Añadir Libro Modal -->
    <div wire:ignore.self class="modal fade modal-lg" id="añadirLibroModal" data-bs-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center ">
                    <h5 class="modal-title text-white" id="createDataModalLabel">Añadir Nuevo Libro</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body row ">
                    <form class="d-flex  row  ">
                        <div class="form-group col-6 mb-1">
                            <label for="Nombre">Nombre Del Libro</label>
                            <input wire:model="Nombre" type="text"
                                class="form-control @error('Nombre') is-invalid @enderror" id="Nombre"
                                placeholder="Nombre">
                            @error('Nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="Autor">Autor Del Libro</label>
                            <input wire:model="Autor" type="text"
                                class=" form-control @error('Autor') is-invalid @enderror" id="Autor"
                                placeholder="Autor">
                            @error('Autor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="Editorial">Editorial</label>
                            <input wire:model="Editorial" type="text"
                                class=" form-control @error('Editorial') is-invalid @enderror" id="Editorial"
                                placeholder="Editorial">
                            @error('Editorial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="Edicion">Edicion</label>
                            <input wire:model="Edicion" type="text"
                                class="form-control @error('Edicion') is-invalid @enderror" id="Edicion"
                                placeholder="Edicion">
                            @error('Edicion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6 mb-1">
                            <label for="Estado">Estado</label>
                            <select wire:model="Estado" class="form-select @error('Estado') is-invalid @enderror"
                                required>
                                <option>Selecione el estado del libro</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Prestado">Prestado</option>
                                <option value="Inactivo">Inactivo</option>

                            </select>
                            @error('Estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="categoria_id">Seleccione el Genero Literario </label>
                            <select wire:model="categoria_id" name="categoria_id"
                                class="form-select @error('categoria_id') is-invalid @enderror" required>

                                @foreach ($categorias as $row)
                                    <option selected value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1 form-group col-6 ">
                            <label for="Cantidad" class="form-label">Cantidad</label>
                            <input type="number" name="Cantidad"
                                class="form-control @error('Cantidad') is-invalid @enderror" id="Cantidad"
                                wire:model="Cantidad" />
                        </div>
                        @error('Cantidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mb-1 ">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                            <textarea class="form-control @error('Descripcion') is-invalid @enderror" id="exampleFormControlTextarea1"
                                wire:model="Descripcion" cols="1" rows="3"></textarea>
                        </div>
                        @error('Descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </form>
                </div>
                <div class="modal-footer  d-flex justify-content-center">
                    <button type="button" class="btn btn-danger close-btn text-white col-4"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()"
                        class="btn btn-warning text-white col-4">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Actualizar Datos Modal -->

    <div wire:ignore.self class="modal fade modal-lg" id="actualizarLibroModal" data-bs-backdrop="static"
        tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center ">
                    <h5 class="modal-title text-white" id="createDataModalLabel">Actualizar Datos Libro</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body row ">
                    <form class="d-flex  row  ">
                        <div class="form-group col-6 mb-1">
                            <label for="Nombre">Nombre Del Libro</label>
                            <input wire:model="Nombre" type="text"
                                class="form-control @error('Nombre') is-invalid @enderror" id="Nombre"
                                placeholder="Nombre">
                            @error('Nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6 mb-1">
                            <label for="Autor">Autor Del Libro</label>
                            <input wire:model="Autor" type="text"
                                class=" form-control @error('Autor') is-invalid @enderror" id="Autor"
                                placeholder="Autor">
                            @error('Autor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="Editorial">Editorial</label>
                            <input wire:model="Editorial" type="text"
                                class=" form-control @error('Editorial') is-invalid @enderror" id="Editorial"
                                placeholder="Editorial">
                            @error('Editorial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="Edicion">Edicion</label>
                            <input wire:model="Edicion" type="text"
                                class="form-control @error('Edicion') is-invalid @enderror" id="Edicion"
                                placeholder="Edicion">
                            @error('Edicion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-6 mb-1">
                            <label for="Estado">Estado</label>
                            <select wire:model="Estado" class="form-select @error('Estado') is-invalid @enderror"
                                required>
                                <option>Selecione el estado del libro</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Prestado">Prestado</option>
                                <option value="Inactivo">Inactivo</option>

                            </select>
                            @error('Estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="categoria_id">Seleccione el Genero Literario </label>
                            <select wire:model="categoria_id" name="categoria_id"
                                class="form-select @error('categoria_id') is-invalid @enderror" required>

                                @foreach ($categorias as $row)
                                    <option selected value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1 form-group col-6 ">
                            <label for="CantidadLibros" class="form-label">Cantidad</label>
                            <input type="number" name="CantidadLibros"
                                class="form-control @error('CantidadLibros') is-invalid @enderror"
                                id="CantidadLibros" wire:model="CantidadLibros">
                        </div>
                        @error('CantidadLibros')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mb-1 ">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                            <textarea class="form-control @error('Descripcion') is-invalid @enderror" id="exampleFormControlTextarea1"
                                wire:model="Descripcion" cols="1" rows="3"></textarea>
                        </div>
                        @error('Descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </form>
                </div>
                <div class="modal-footer  d-flex justify-content-center">
                    <button type="button" class="btn btn-danger close-btn text-white col-4"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="actualizarLibro()"
                        class="btn btn-warning text-white col-4">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal " id="verlibro" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            Detalles Del Libro
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nombre Del Libro:{{ $Nombre }}</h5>
                            <h5>Autor:{{ $Autor }}</h5>
                            <h5>Autor:{{ $Editorial }}</h5>
                            <h5>Autor:{{ $Edicion }}</h5>
                            <h5>Autor:{{ $Descripcion }}</h5>
                            <h5>Estado:{{ $Estado }}</h5>

                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

