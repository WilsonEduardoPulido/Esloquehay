
<div>





@if (session()->has('alertaprestamow'))
    <div wire:poll.7s class="alert alert-info alert-dismissible fade show" role="alert">
      
        <strong>
            <p class="small">{{ session('alertaprestamow') }}</p>
        </strong>
    </div>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert)
        })
    </script>
@endif



<div class="card p-1">
    <div class="card-header bg-info text-center text-white">
        Realizar Prestamo de un elemento
    </div>
    


        <form class="col-12" wire:submit.prevent="realizarPrestamo" id="#PrestamoElemento">
            <div class="">
                <label class="form-label">Bibliotecario</label>
                <input disabled type="text" class="form-control  @error('name') is-invalid @enderror " id="validationServer01" required wire:model="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            


            <div class="">
                <label for="validationServer01" class="form-label">Alumno o Persona
                    Solicitante</label>

                <select class="form-select"  @error('usuario_id') is-invalid @enderror name="" id="" wire:model="usuario_id">

                    @foreach ($consultaUsuarios as $usuario)
                        <option selected value="{{ $usuario->id }}"> {{ $usuario->name }}
                        </option>
                    @endforeach


                </select>
                @error('usuario_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

   

    <div class="">
        <label for="validationServer01" class="form-label">Elemento</label>
        <input type="text" disabled class="form-control  @error('nombreElemento') is-invalid @enderror" id="validationServer01" required wire:model="nombreElemento">
        @error('nombeElemento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="">
        <label for="validationServer01" class="form-label">Cantidad Disponible</label>
        <input disabled type="number" class="form-control  @error('cantidadElemento') is-invalid @enderror " id="validationServer01" value="Mark" required
            wire:model="cantidadElemento">
            @error('cantidadElmento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="">
        <label for="validationServer01" class="form-label">Cantidad a Prestar</label>
        <input type="number" class="form-control  @error('CantidadPrestar') is-invalid @enderror " id="validationServer01" value="Mark" required
            wire:model="CantidadPrestar">
            @error('CantidadPrestar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="">
        <label for="validationServer01" class="form-label">Fecha del prestamo</label>
        <input type="date" class="form-control  @error('Fecha_Prestamo') is-invalid @enderror" id="validationServer01" value="Mark" required
            wire:model="Fecha_Prestamo">
            @error('Fecha_Prestamo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="mt-4 col-12 justify-content-around  d-flex">
        <button type="button" title="Cancelar" wire:click="limpiarCampos()"  class="btn btn-danger  btn-sm text-white ">Cancelar</button>
        <button type="submit" title="Prestar" class="btn btn-warning btn-sm text-white  ">Prestar</button>
        
    </div>

  
    </form>
</div>


