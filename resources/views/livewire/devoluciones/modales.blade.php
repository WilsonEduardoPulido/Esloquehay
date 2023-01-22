<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Devolucion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="Fecha_devolucion"></label>
                        <input wire:model="Fecha_devolucion" type="text" class="form-control" id="Fecha_devolucion" placeholder="Fecha Devolucion">@error('Fecha_devolucion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="prestamos_id"></label>
                        <input wire:model="prestamos_id" type="text" class="form-control" id="prestamos_id" placeholder="Prestamos Id">@error('prestamos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="libros_id"></label>
                        <input wire:model="libros_id" type="text" class="form-control" id="libros_id" placeholder="Libros Id">@error('libros_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="elementos_id"></label>
                        <input wire:model="elementos_id" type="text" class="form-control" id="elementos_id" placeholder="Elementos Id">@error('elementos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="usuario_id"></label>
                        <input wire:model="usuario_id" type="text" class="form-control" id="usuario_id" placeholder="Usuario Id">@error('usuario_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="curso_id"></label>
                        <input wire:model="curso_id" type="text" class="form-control" id="curso_id" placeholder="Curso Id">@error('curso_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Devolucion</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="Fecha_devolucion"></label>
                        <input wire:model="Fecha_devolucion" type="text" class="form-control" id="Fecha_devolucion" placeholder="Fecha Devolucion">@error('Fecha_devolucion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="prestamos_id"></label>
                        <input wire:model="prestamos_id" type="text" class="form-control" id="prestamos_id" placeholder="Prestamos Id">@error('prestamos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="libros_id"></label>
                        <input wire:model="libros_id" type="text" class="form-control" id="libros_id" placeholder="Libros Id">@error('libros_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="elementos_id"></label>
                        <input wire:model="elementos_id" type="text" class="form-control" id="elementos_id" placeholder="Elementos Id">@error('elementos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="usuario_id"></label>
                        <input wire:model="usuario_id" type="text" class="form-control" id="usuario_id" placeholder="Usuario Id">@error('usuario_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="curso_id"></label>
                        <input wire:model="curso_id" type="text" class="form-control" id="curso_id" placeholder="Curso Id">@error('curso_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
