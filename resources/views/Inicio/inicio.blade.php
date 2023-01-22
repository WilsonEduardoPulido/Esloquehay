@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section">


        @include('partials.nav')
        @include('partials.panel')




        <div class="d-flex m-5 row">
            <div class="col-12  card-body col-sm-6 justify-content-center d-flex align-items-center flex-column   ">
                <h2 class="m-1 fs-4">Reporte semanal</h2>


             




                  
                        <canvas id="grafica"></canvas>
                    


                </div>
                <div class="col-sm-6 col-12 justify-content-center d-flex align-items-center flex-column ">
                    <h2 class="m-1 fs-4">Reporte General</h2>
                    <canvas id="my"></canvas>
                </div>




            </div>
    </section>
    @include('partials.footer')


   





@endsection
<script src="{{ asset('jquery3.6.3.js') }}"></script>


<script>
    $(function() {


      var usuarios = {{ json_encode($totalcantidadActivosUsuarios) }}
        var datos = {{ json_encode($totalDevolucionesRealizadas) }}
        var datosc = {{ json_encode($totalCategoriasActivas) }}
        var libros = {{ json_encode($totalLibrosActivos) }}
        var prestamos = {{ json_encode($totalPrestamosActivos) }}


        var devoluciones = {{ json_encode($totalDevolucionesRealizadas) }}
        

        const colors = ['rgb(46, 125, 50 )', 'rgb(156, 39, 176)', 'rgb(66, 165, 245)', 'rgb(0, 172, 193 )','rgb(255, 238, 88)'];



        const ctx = document.getElementById('grafica');

        new Chart(ctx, {
            type: 'bar',
            
            data: {
                labels: ['Categorias', 'Devoluciones', 'Usarios', 'libros', 'Prestamos', 'Devoluciones'],
                datasets: [{
                    label: 'Estadisticas Sisconver ',
                    data: [datosc,datos,usuarios,libros,prestamos,devoluciones],
                    borderWidth: 1,
                    backgroundColor: colors
                    
                }]
            },
           


            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
