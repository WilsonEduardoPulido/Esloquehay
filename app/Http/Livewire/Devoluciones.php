<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Devolucion;

class Devoluciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Fecha_devolucion, $prestamos_id, $libros_id, $elementos_id, $usuario_id, $curso_id;







    public function render()
    {




		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.devoluciones.vistaprincipal', [
            'devolucions' => Devolucion::latest()
						
						->orWhere('prestamos_id', 'LIKE', $keyWord)
						->orWhere('libros_id', 'LIKE', $keyWord)
						->orWhere('elementos_id', 'LIKE', $keyWord)
						->orWhere('usuario_id', 'LIKE', $keyWord)
						->orWhere('curso_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Fecha_devolucion = null;
		$this->prestamos_id = null;
		$this->libros_id = null;
		$this->elementos_id = null;
		$this->usuario_id = null;
		$this->curso_id = null;
    }

    public function store()
    {
        $this->validate([
		'Fecha_devolucion' => 'required',
		'prestamos_id' => 'required',
		'libros_id' => 'required',
		'elementos_id' => 'required',
		'usuario_id' => 'required',
		'curso_id' => 'required',
        ]);

        Devolucion::create([ 
			'Fecha_devolucion' => $this-> Fecha_devolucion,
			'prestamos_id' => $this-> prestamos_id,
			'libros_id' => $this-> libros_id,
			'elementos_id' => $this-> elementos_id,
			'usuario_id' => $this-> usuario_id,
			'curso_id' => $this-> curso_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Devolucion Successfully created.');
    }

    public function edit($id)
    {
        $record = Devolucion::findOrFail($id);
        $this->selected_id = $id; 
		$this->Fecha_devolucion = $record-> Fecha_devolucion;
		$this->prestamos_id = $record-> prestamos_id;
		$this->libros_id = $record-> libros_id;
		$this->elementos_id = $record-> elementos_id;
		$this->usuario_id = $record-> usuario_id;
		$this->curso_id = $record-> curso_id;
    }

    public function update()
    {
        $this->validate([
		'Fecha_devolucion' => 'required',
		'prestamos_id' => 'required',
		'libros_id' => 'required',
		'elementos_id' => 'required',
		'usuario_id' => 'required',
		'curso_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Devolucion::find($this->selected_id);
            $record->update([ 
			'Fecha_devolucion' => $this-> Fecha_devolucion,
			'prestamos_id' => $this-> prestamos_id,
			'libros_id' => $this-> libros_id,
			'elementos_id' => $this-> elementos_id,
			'usuario_id' => $this-> usuario_id,
			'curso_id' => $this-> curso_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Devolucion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Devolucion::where('id', $id)->delete();
        }
    }



	//ver Detalles de la devolucion 


	public function verDetalleDevolucion(){


		$consultaDetallesDevolucion = Devolucion::select('devolucions.id', 'devolucion.created_at')
			->join('elementos', 'elementos.id', '=', 'prestamos.elementos_id')
			->get();

		dd($consultaDetallesDevolucion);
	}
}