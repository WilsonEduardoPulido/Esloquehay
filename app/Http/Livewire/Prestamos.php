<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use App\Models\Elemento;
use App\Models\Prestamo;

use App\Models\Devolucion;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Prestamos extends Component
{
    use WithPagination;

    protected $listeners = ['render' => 'render'];

	protected $paginationTheme = 'bootstrap';
    public $prestamos_id,$CantidadPrestamo;
    public $selected_id, $buscadorPrestamos, $Fecha_prestamo, $libros_id, $elementos_id, $usuario_id, $curso_id,$CantidadPrestada,$ArticuloPrestado;
    public $usuarioDeudor,$prestador_id,$bibliotecario,$articuloDevolver,$CantidadPrestadaDevolver,$usuarioDeudorD,$NovedadesDevolucion,$CantidadDevuelta;

    public $detalleElemento,$cantidadPrestadaDetalle,$fechaDetalle,$nombreDeudor,$apellidoDeudor,$gradoDeudor,$numeroiDeudor,$tipoDocDeudor,$celularDeudor,$direccionDeudor,$estadoDetalle;
    
    
    
    public function render()

    {
        $prestamosEliminados= Prestamo::onlyTrashed()->where('Estado_Prestamo','Inactivo')->paginate(10); 

        $consultaUsuariosPrestamos =User::where('Estado', "=", 'Activo')->select('id', 'name')->get();
       
		$buscadorPrestamos = '%'.$this->buscadorPrestamos .'%';



        

            return view('livewire.prestamos.vistaprestamos', [
                'prestamos' => Prestamo::latest()
                            ->orWhere('Fecha_prestamo', 'LIKE', $buscadorPrestamos)
                            ->orWhere('libros_id', 'LIKE', $buscadorPrestamos)
                            ->orWhere('elementos_id', 'LIKE', $buscadorPrestamos)
                            ->orWhere('usuario_id', 'LIKE', $buscadorPrestamos)
                            ->orWhere('curso_id', 'LIKE', $buscadorPrestamos)
                            ->paginate(8),
            ],compact('consultaUsuariosPrestamos','prestamosEliminados'));
         

      

    

}
/*


$prestamos = Prestamo::select('prestamos.id','elementos.*','libros.*')
           
            ->join('elementos','elementos.id','=','prestamos.elementos_id')
            ->join('libros','libros.id','=','prestamos.libros_id')
            ->get();
        return view('livewire.prestamos.vistaprestamos', [
            'prestamos' => Prestamo::latest()
						->orWhere('Fecha_prestamo', 'LIKE', $buscadorPrestamos)
						->orWhere('libros_id', 'LIKE', $buscadorPrestamos)
						->orWhere('elementos_id', 'LIKE', $buscadorPrestamos)
						->orWhere('usuario_id', 'LIKE', $buscadorPrestamos)
						->orWhere('curso_id', 'LIKE', $buscadorPrestamos)
						->paginate(8),
        ],compact('consultaUsuariosPrestamos','prestamosEliminados'));
     
       


        $prestamos = Prestamo::select('prestamos.id','prestamos.CantidadPrestada','prestamos.Fecha_prestamo','prestamos.Estado_Prestamo','prestamos.elementos_id','prestamos.Fecha_prestamo','prestamos.Estado_Prestamo','prestamos.usuario_id','prestamos.elementos_id','prestamos.prestador_id','elementos.nombre','libros.Nombre')
        ->join('elementos','elementos.id','=','prestamos.elementos_id')
        ->join('libros','libros.id','=','prestamos.libros_id')
        ->where('prestamos.Estado_Prestamo','=','Activo')
        ->orderBy('prestamos.id','desc')
        ->orWhere('Fecha_prestamo','LIKE','%'.$this->buscadorPrestamos)
        
       
        
        ->orWhere('CantidadPrestada','LIKE','%'.$this->buscadorPrestamos.'%')
        
        
        ->paginate(5);*/
    
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Fecha_prestamo = null;
		$this->libros_id = null;
		$this->elementos_id = null;
		$this->usuario_id = null;
		$this->curso_id = null;
    }

    public function store()
    {
        $this->validate([
		'Fecha_prestamo' => 'required',
		'libros_id' => 'required',
		'elementos_id' => 'required',
		'usuario_id' => 'required',
		'curso_id' => 'required',
        ]);

        Prestamo::create([ 
			'Fecha_prestamo' => $this-> Fecha_prestamo,
			'libros_id' => $this-> libros_id,
			'elementos_id' => $this-> elementos_id,
			'usuario_id' => $this-> usuario_id,
			'curso_id' => $this-> curso_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Prestamo Successfully created.');
    }

    public function editarPrestamo($id)
    {
        $editarPrestamo = Prestamo::findOrFail($id);
        
       $elemento=Elemento::findOrFail($editarPrestamo->elementos_id);
       $usuario=User::findOrFail($editarPrestamo->usuario_id);

        
       
      
         $this->CantidadPrestada=$editarPrestamo->CantidadPrestada;
$this->ArticuloPrestado=$elemento->nombre;
$this->elementos_id = $elemento->id; 

        $this->selected_id = $id; 
		$this->Fecha_prestamo = $editarPrestamo-> Fecha_prestamo;
		
        $this->usuarioDeudor=$usuario->name;
        $this->elementos_id = $editarPrestamo-> nombre;
		
    }
/*
    public function actualizarPrestamo()
    {
        
        if ($this->selected_id) {
			$actualizarPrestamo= Prestamo::find($this->selected_id);

            
        $this->CantidadPrestada=$actualizarPrestamo->CantidadPrestada;

        $nuevaCantidad=$this->CantidadPrestada;

           $actualizar=$this->CantidadPrestada= $nuevaCantidad;

            dd($actualizar);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Prestamo Successfully updated.');
        }
    }
    */

     //Eliminar De Manera Temporal Prestamo
     public function inactivarPrestamo($id)
     {
    
         $prestamoEli = Prestamo::find($id);

        
        
         if($prestamoEli->Estado_Prestamo == 'Activo' or $prestamoEli->Estado_Prestamo == 'Finalizado'){
             $prestamoEli->Estado_Prestamo = 'Inactivo';

            
             $prestamoEli->save();
             $prestamoEli->delete();
             
            

            $this->emit('render')
            ;             
             
     }
     
        
     }
     



     public function cargarDatosDevolucionPrestamo($id){
    $cargarDatosDevolucion = Prestamo::findOrFail($id);
       $elemento=Elemento::findOrFail($cargarDatosDevolucion->elementos_id);
         $usuario=User::findOrFail($cargarDatosDevolucion->usuario_id);
        $prestador = Auth::user()->name;
       $this->bibliotecario = $prestador;
       $this->prestador_id = Auth::user()->id;
        
       
      
         $this->CantidadPrestadaDevolver=$cargarDatosDevolucion->CantidadPrestada;
$this->articuloDevolver=$elemento->nombre;


        $this->selected_id = $id; 
		$this->Fecha_prestamo = $cargarDatosDevolucion-> Fecha_prestamo;
		
        $this->usuarioDeudorD=$usuario->name;
        $this->usuario_id = $usuario->id;
        $this->elementos_id = $cargarDatosDevolucion-> nombre;
$this->elementos_id=$elemento->id;
$this->prestamos_id=$cargarDatosDevolucion->id;

        
     }
     //Finalizar Prestamo 

     public function finalizarPrestamoEstado($id)
     {
         $prestamoFinalizarCambiarEstado = Prestamo::find($id);
         if($prestamoFinalizarCambiarEstado->Estado == 'Activo'){
             $prestamoFinalizarCambiarEstado->Estado = 'Finalizado';
             $prestamoFinalizarCambiarEstado->save();
             $prestamoFinalizarCambiarEstado->delete();
             
            
             
             
     }
    }

    public function actualizarCantidadElementosDevolucion(){



        $elementoDevo = Elemento::findOrFail($this->elementos_id);
    
        // 0 

        //250
        $CantidadDevuelta = $this->CantidadDevuelta;
        

        $total=$CantidadDevuelta + $elementoDevo->cantidad;

        $elementoDevo->cantidad=$total;

        

        $elementoDevo->update();

        session()->flash('mensajedevo', 'Cantidad Devuelta Con Exito .....');
    }


    public function actualizarCantidadDevolucion(){
        
        $prestamo = Prestamo::select('elementos.id','elementos.cantidad')
        ->join('elementos','elementos.id','=','prestamos.elementos_id')
        ->where('prestamos.id','=',$this->selected_id)
        ->first()
        ->findOrFail($this->selected_id);


        

        $CantidadDevuelta = $this->CantidadDevuelta;
        
        $cantidadActual= $prestamo->CantidadPrestada;

        if($CantidadDevuelta > $cantidadActual){
            session()->flash('mensajedevo', 'La Cantidad Devuelta No Puede Ser Mayor A La Cantidad Prestada .....');
            
        }elseif($CantidadDevuelta == 0){
            session()->flash('mensajedevo', 'La Cantidad Devuelta No Puede Ser menor o igual a 0 .....');
        }else{


            $total= $cantidadActual - $CantidadDevuelta;


        if($total == 0){
            $prestamo->Estado_Prestamo = 'Finalizado';
            session()->flash('mensajedevo', 'Prestamo Finalizado Con exito.......' );
        }
    
        $prestamo->CantidadPrestada=$total;



            $this->actualizarCantidadElementosDevolucion();
           

        $prestamo->update();

        

        $prestamo->save();
        $this->cancelarDevolucion();
        }
        

        

    }
    
     public function enviarDatosDevolucion(){


        
        $this->validate([
            
            'elementos_id' => 'required',
            'usuario_id' => 'required',
            'prestador_id' => 'required',
          
            'CantidadDevuelta' => 'required',
           
           
           
        ]);

       
       





            if ($this->selected_id) {
                $finalizarPrestamo = Devolucion::find($this->selected_id);

            
                $finalizarPrestamo = new Devolucion();
                $finalizarPrestamo->Cantidad_Devuelta = $this->CantidadDevuelta;
                $finalizarPrestamo->elementos_id = $this->elementos_id;

            
                $finalizarPrestamo->usuario_id = $this->usuario_id;
                $finalizarPrestamo->prestamos_id = $this->selected_id;
               
                $finalizarPrestamo->Novedades = $this->NovedadesDevolucion;
                $finalizarPrestamo->prestador_id = Auth::user()->id;
                $this->actualizarCantidadDevolucion();
                $finalizarPrestamo->save();


               
                   
                }
            
                
            
        


    
      
        }
        
              
          
    


      public function cancelarDevolucion(){

       $this->NovedadesDevolucion='';
         $this->CantidadDevuelta='';
            $this->elementos_id='';
            $this->usuario_id='';
            $this->prestamos_id='';
            $this->prestador_id='';
            $this->selected_id='';
            $this->CantidadPrestadaDevolver='';
         
            $this->bibliotecario ='';
            $this->prestador_id = '';
             
            
           
              
     $this->articuloDevolver='';
     
     
        $this->Fecha_prestamo='';
             
             $this->usuarioDeudorD='';
            
        
    }


    public function verDetallesPrestamo($id){

        
        $consulta = Prestamo::select('prestamos.id', 'prestamos.CantidadPrestada', 'prestamos.Fecha_prestamo', 'prestamos.Estado_Prestamo', 'prestamos.usuario_id', 'prestamos.elementos_id', 'prestamos.prestador_id', 'elementos.nombre', 'elementos.cantidad', 'users.name','users.lastname','users.Grado','users.TipoDoc','users.NumeroDoc','users.direccion','users.celular')
            ->join('elementos', 'elementos.id', '=', 'prestamos.elementos_id')
            ->join('users', 'users.id', '=', 'prestamos.usuario_id')
            ->where('prestamos.id', '=', $id)
            ->first();


        $this->prestador_id = Auth::user()->id;

        $this->bibliotecario = Auth::user()->name;

        $this->detalleElemento = $consulta->nombre;

        $this->fechaDetalle = $consulta->Fecha_prestamo;
        $this->cantidadPrestadaDetalle= $consulta->CantidadPrestada;
        $this->nombreDeudor = $consulta->name;
        $this->apellidoDeudor = $consulta->lastname;
        $this->gradoDeudor = $consulta->Grado;
        $this->numeroiDeudor = $consulta->NumeroDoc;
        $this->tipoDocDeudor = $consulta->TipoDoc;
        $this->celularDeudor = $consulta->celular;
        $this->direccionDeudor = $consulta->direccion;
        $this->estadoDetalle = $consulta->Estado_Prestamo;
    }

   
}

    /*
    public function render()
    {
        $prestamos = Prestamo::select('prestamos.id','prestamos.CantidadPrestada','prestamos.Fecha_prestamo','prestamos.Estado_Prestamo','prestamos.Novedades','prestamos.usuario_id','prestamos.elementos_id','prestamos.prestador_id','elementos.nombre','elementos.cantidad','users.name')
        ->join('elementos','elementos.id','=','prestamos.elementos_id')
        ->join('users','users.id','=','prestamos.usuario_id')
        ->where('prestamos.Estado_Prestamo','=','Activo')
        ->get();
        return view('livewire.prestamo.prestamo-component',compact('prestamos'));


        public function render()
    {
        $prestamos = Prestamo::select('prestamos.id','prestamos.CantidadPrestada','prestamos.Fecha_prestamo','prestamos.Estado_Prestamo','prestamos.Novedades','prestamos.usuario_id','prestamos.elementos_id','prestamos.prestador_id','elementos.nombre','elementos.cantidad','users.name')
        ->join('elementos','elementos.id','=','prestamos.elementos_id')
        ->join('users','users.id','=','prestamos.usuario_id')
        ->where('prestamos.Estado_Prestamo','=','Activo')
        ->orderBy('prestamos.id','desc')
        ->orWhere('Fecha_prestamo','LIKE','%'.$this->search.'%')
        ->orWhere('CantidadPrestada','LIKE','%'.$this->search.'%')
        ->orWhere('Estado_Prestamo','LIKE','%'.$this->search.'%')
        ->orWhere('Novedades','LIKE','%'.$this->search.'%')
        ->orWhere('name','LIKE','%'.$this->search.'%')
        ->orWhere('nombre','LIKE','%'.$this->search.'%')
        ->paginate(5);
        ->get();
        return view('livewire.prestamo.prestamo-component',compact('prestamos'));
    } 
    } */


     
