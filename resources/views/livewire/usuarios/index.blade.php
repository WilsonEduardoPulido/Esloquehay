@extends('layouts.app')
@section('title', __('Gestion De Usuarios'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section h-50 bg-light">
        @include('partials.nav')


        <div class=" m-auto">
           

            
            @livewire('usuarios')
        </div>





    </section>
   




    </div>
    @include('partials.footer')
@endsection

<script>
       
    window.addEventListener('cerrar', event => {
        $('#staticBackdrop').modal('hide')
        $('#EditarUsuario').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open'); 
            $('.modal-backdrop').remove(); 
            
        };
        
function ver(){

    var tipo=document.getElementById('password');
    if(tipo.type =="password"){
        tipo.type="text";
    }else{
        tipo.type="password";
    }
      
}
        
      
} );
        

</script>
