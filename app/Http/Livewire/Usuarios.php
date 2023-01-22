<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

  
  
class Usuarios extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $buscar;
    public $usuario_id;
    public $name, $lastname, $email, $TipoDoc, $direccion, $celular, $Grado, $password, $Estado, $NumeroDoc, $password_confirmation;
    public function render()
    {

$usuariosInactivos=User::onlyTrashed()->orWhere("Estado" ,"=", "Inactivo")->paginate(10);
        $buscar = '%' . $this->buscar . '%';
        return view('livewire.usuarios.VistaPrincipalUsuarios', [
            'usuarios' => User::latest()->where('Estado', '=', 'Activo')
                ->orWhere('name', 'LIKE', $buscar)
                ->orWhere('lastname', 'LIKE', $buscar)
                ->orWhere('email', 'LIKE', $buscar)

                ->orWhere('direccion', 'LIKE', $buscar)
                ->orWhere('celular', 'LIKE', $buscar)
                ->orWhere('Grado', 'LIKE', $buscar)
                ->paginate(10),
        ],compact('usuariosInactivos'));
    }


    public function cancelar()
    {
        $this->resetInput();
    }
    
    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|string|email| max:255| unique:users',
        'password' => 'required|string|min:8',
'password_confirmation'=>'required|string|min:8',
        'lastname' => 'required| |string|max:50',

        'direccion' => 'required|string|max:38|unique:users',
        'Grado' => 'required|string',
        'NumeroDoc' => 'required|string|min:1|max:10|unique:users|',
        'TipoDoc' => 'required|string',
        'celular' => 'required|string|unique:users|min:1|max:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    private function resetInput()
    {
        $this->name = null;
        $this->lastname = null;
        $this->email = null;
        $this->TipoDoc = null;
        $this->NumeroDoc = null;
        $this->direccion = null;
        $this->celular = null;
        $this->Grado = null;
        $this->Estado = null;
        $this->password = null;
    }

    public function crearUsuario()
    {

        



        


        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'TipoDoc' => $this->TipoDoc,
            'NumeroDoc' => $this->NumeroDoc,
            'direccion' => $this->direccion,
            'celular' => $this->celular,
            'Grado' => $this->Grado,
            

            'password' => Hash::make($this->password),
        ]);


        $this->resetInput();
        $this->dispatchBrowserEvent('cerrar');
        session()->flash('message', 'Usuario Creado Con Exito.');
    }





    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $this->usuario_id = $id;

        $this->name = $usuario->name;
        $this->lastname = $usuario->lastname;
        $this->email = $usuario->email;
$this->NumeroDoc=$usuario->NumeroDoc;
$this->TipoDoc=$usuario->TipoDoc;
        $this->direccion = $usuario->direccion;
        $this->celular = $usuario->celular;
        $this->Grado = $usuario->Grado;
        $this->Estado = $usuario->Estado;
        $this->password = $usuario->password;



    }




    public function actualizarUsuario()
    {
        $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            
            'direccion' => 'required',
            'celular' => 'required',
            'Grado' => 'required',
        ]);

        if ($this->usuario_id) {
            $usuario = User::find($this->usuario_id);
             
            $usuario->name = $this->name;
            $usuario->lastname = $this->lastname;
            $usuario->email = $this->email;
            $usuario->TipoDoc = $this->TipoDoc;
            $usuario->NumeroDoc = $this->NumeroDoc;
            $usuario->direccion = $this->direccion;
            $usuario->celular = $this->celular;
            $usuario->Grado = $this->Grado;
            $usuario->Estado = $this->Estado;


            

            $usuario->save();

               
            if($usuario->Estado == 'Activo'){
                $usuario->restore();
            }
            else{
                $usuario->delete();
            }
    
          

            $this->resetInput();
            $this->dispatchBrowserEvent('cerrar');
            session()->flash('message', 'Usuario Actualizado Con Exito.');
        } if(auth()->user()->Estado =='Inactivo' or auth()->user()->Estado =='Sancionado'){
            return redirect()->route('login');
            
        }


       
        


    }

    //Eliminar De Manera Temporal Usuario
    public function eliminarTemporalUsuario($id)
    {
        $usuarioT = User::find($id);
        if($usuarioT->Estado == 'Activo'){
            $usuarioT->Estado = 'Inactivo';
            $usuarioT->save();
            $usuarioT->delete();
            session()->flash('message', 'Usuario Inactivado Con Exito.');
  }  }
    
//Restaurar Categoria Eliminada

    public function restaurarUsuario($id){
        $usuarioR = User::onlyTrashed()->where('id', $id)->first();
        if($usuarioR->Estado == 'Inactivo'){
            $usuarioR->Estado = 'Activo';
            $usuarioR->save();
        }
        $usuarioR->restore();
        session()->flash('mensaje', 'Usuario Restaurado Con Exito.');
    }
    
    
        //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMente($id){
    
    $usuarioD =User::onlyTrashed()->where('id', $id)->first();

    $usuarioD->forceDelete();
    session()->flash('mensaje','Usuario Eliminado Del Sistema');
    }
    
    

}