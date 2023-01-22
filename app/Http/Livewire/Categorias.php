<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component
{
    use WithPagination;

    

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $buscarCategoria, $nombre, $descripcion, $Estado,$Tipo;
    
    
    public function render()

    {
        $buscarCategoria = '%'.$this->buscarCategoria .'%';
        
        $consulta = Categoria::onlyTrashed()
     
        ->orWhere('Estado', "=" ,"Inactiva")
        
        ->paginate(10);

        $categorias = Categoria::all();
    
        
        
        return view('livewire.categorias.view',  [
            'categorias' => Categoria::latest()
            ->orWhere('nombre', 'LIKE', $buscarCategoria)
            ->orWhere('descripcion', 'LIKE', $buscarCategoria)
            ->orWhere('Estado', 'LIKE', $buscarCategoria)
            ->orWhere('Tipo', 'LIKE', $buscarCategoria)
            ->paginate(10),
        ],  
        
        
        
        
        compact ('consulta','categorias'));
        
    }                             
		

    
	

    




    //limpia los campos de los modales llama a la funcion resetInput
    public function cancelar()
    {
        $this->resetInput();
$this->resetErrorBag();
        $this->resetValidation();
    }
	
    /*
public function inactivarCategoria($id){


   

        $categoria = Categoria::find($id);
        if($categoria->Estado == 'Activa'){
            $categoria->Estado = 'Inactiva';
            $categoria->save();
            session()->flash('message', 'Categoria Inactivada Con Exito.');
    }
    else {


        $categoria->Estado = 'Activa';
        $categoria->save();
        session()->flash('message', 'Categoria Activada Con Exito.');
    }


}*/
    //limpia los campos de los modales
    private function resetInput()
    {		
		$this->nombre = null;
		$this->descripcion = null;
		$this->Estado = null;
        $this->Tipo = null;
    }

    //Reglas de Validacion 
    protected $rules = [
    'nombre' => 'required|min:3|max:20|unique:categorias,nombre|string',
        'descripcion' => 'required|max:50|string',
        
        'Tipo'=> 'required'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    //Editar Categoria retorna los datos al formulario
    public function editarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $categoria-> nombre;
		$this->descripcion = $categoria-> descripcion;
        $this->Tipo=$categoria->Tipo;
		$this->Estado = $categoria-> Estado;
    
    }


    //Actualizar los datos de la categoria
    public function actualizarCategoria()
    {
        $this->validate([
			'nombre' => 'required|min:3|max:20|string',
        'descripcion' => 'required|max:50|string',
        
        'Tipo'=> 'required'
		]);

        if ($this->selected_id) {
			$categoria = Categoria::find($this->selected_id);
            $categoria->update([ 
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion,
			'Estado' => $this-> Estado,
            'Tipo'=>$this->Tipo
            ]);

            if($categoria->Estado == 'Activa'){
                $categoria->restore();
            }
            else{
                $categoria->delete();
            }
            $this->resetInput();
            $this->dispatchBrowserEvent('cerrar');
			
            $this->dispatchBrowserEvent('swal', [
    'title' => 'Categoria Actualizada Con exito.',
    'icon'=>'success',
    'iconColor'=>'green',
]);
        }

        
    }

    //Eliminar De Manera Temporal Categoria
    public function destroy($id)
    {


        $categoria = Categoria::find($id);
        
        if($categoria->Estado == 'Activa' ){
            $categoria->Estado = 'Inactiva';
            $categoria->save();
            $categoria->delete();
            
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Categoria Inactivada Con Exito..',
                'icon'=>'info',
                'iconColor'=>'blue',
            ]);
            
            
    }
    
       
    }
    
//Restaurar Categoria Eliminada

    public function restaurarCategoria($id){
        $categoriao = Categoria::onlyTrashed()->where('id', $id)->first();
        if($categoriao->Estado == 'Inactiva'){
            $categoriao->Estado = 'Activa';
            $categoriao->save();
        }
        $categoriao->restore();
        

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Categoria Restaurada Con Exito...',
            'icon'=>'success',
            'iconColor'=>'green',
        ]);
        
    }
    
    
        //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMente($id){
    
    $categoriao =Categoria::onlyTrashed()->where('id', $id)->first();

    $categoriao->forceDelete();
    $this->dispatchBrowserEvent('swal', [
        'title' => 'Categoria Eliminada Del Sistema...',
        'icon'=>'danger',
        'iconColor'=>'red',
    ]);
    
    }

//Crear Categoria
    public function crearCategoria()
    {
        $validarDatos =  $this->validate();
        
        $categoria = new Categoria();
        $categoria->nombre = $this->nombre;
        $categoria->descripcion = $this->descripcion;
        $categoria->Tipo = $this->Tipo;
        $categoria->save();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('cerrar');
 
        
        $this->resetInput();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Categoria creada con exito...',
            'icon'=>'success',
            'iconColor'=>'green',
        ]);
       
    }




    public function verDetallesCategoria($id){

        $categoria = Categoria::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $categoria-> nombre;
		$this->descripcion = $categoria-> descripcion;
        $this->Tipo=$categoria->Tipo;
		$this->Estado = $categoria-> Estado;

    }
}