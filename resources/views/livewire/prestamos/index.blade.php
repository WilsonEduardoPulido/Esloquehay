@extends('layouts.app')
@section('title', __('Gestion De Prestamos'))
@section('content')




    @include('partials.sidebar')

    

    <section class="home-section " >
        @include('partials.nav')

        

       
           
                
                    

                        
        @livewire('prestamos')
                       
                       
                
                
           
         

           

<div class="mt-5 ">
    @include('partials.footer')
    </div>

                     

    </section>
   







@endsection









