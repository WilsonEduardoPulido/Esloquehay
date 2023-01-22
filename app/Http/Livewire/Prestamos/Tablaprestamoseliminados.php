<?php

namespace App\Http\Livewire\Prestamos;

use Livewire\Component;
use App\Models\Prestamo;
use Livewire\WithPagination;
class Tablaprestamoseliminados extends Component
{

    use WithPagination;

    protected $listeners = ['render' => 'render'];
	protected $paginationTheme = 'bootstrap';
    public function render()


    {


        $prestamosEliminados= Prestamo::onlyTrashed()->where('Estado_Prestamo','Inactivo')->paginate(10); 
        return view('livewire.prestamos.tablaprestamoseliminados',compact('prestamosEliminados'));
    }





 //Restaurar Prestamo Eliminada
 
 public function restaurarPrestamo($id){
    $prestamoRestaurar = Prestamo::onlyTrashed()->where('id', $id)->first();
    if($prestamoRestaurar->Estado_Prestamo == 'Inactivo' ){
        $prestamoRestaurar->Estado_Prestamo = 'Activo';
        $prestamoRestaurar->save();
    }
    $prestamoRestaurar->restore();
    

    $this->dispatchBrowserEvent('swal', [
        'title' => 'Categoria Restaurada Con Exito...',
        'icon'=>'success',
        'iconColor'=>'green',
    ]);

        $this->emit('render');
}


    //Elimina El Registro De La Base De Datos De Manera Definitiva
public function eliminarTotalMente($id){

$prestamoEliminarT =Prestamo::onlyTrashed()->where('id', $id)->first();

$prestamoEliminarT->forceDelete();
$this->dispatchBrowserEvent('swal', [
    'title' => 'Categoria Eliminada Del Sistema...',
    'icon'=>'danger',
    'iconColor'=>'red',
]);

}




}
