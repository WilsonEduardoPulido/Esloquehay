@extends('layouts.app')
@section('title', __('Gestion De Devoluciones'))
@section('content')




    @include('partials.sidebar')

    

    <section class="home-section " >
        @include('partials.nav')

        

       
           
                
                    

                        
        @livewire('devoluciones')
                       
                       
                
                
           
         

           

<div class="mt-5 ">
    @include('partials.footer')
    </div>

                     

    </section>
   







@endsection



