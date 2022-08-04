<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wage;
use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditVacancy extends Component
{
    use WithFileUploads;

    public $vacancy_id;
    public $title;
    public $wage_id;
    public $category_id;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;

    protected $rules = [
        'title'         => 'required|string',
        'wage_id'       => 'required',
        'category_id'   => 'required',
        'company'       => 'required',
        'last_day'      => 'required',
        'description'   => 'required',
        'new_image'     => 'nullable|image|max:1024',
    ];



    public function mount(Vacancy $vacancy)
    {
        $this->vacancy_id   = $vacancy->id;
        $this->title        = $vacancy->title;
        $this->wage_id      = $vacancy->wage_id;
        $this->category_id  = $vacancy->category_id;
        $this->company      = $vacancy->company;
        $this->last_day     = Carbon::parse( $vacancy->last_day )->format('Y-m-d');
        $this->description  = $vacancy->description;
        $this->image        = $vacancy->image;

    } 

    public function render()
    {
        $wages      = Wage::all();
        $categories = Category::all();

        return view('livewire.edit-vacancy', [
            'wages'         => $wages,
            'categories'    => $categories
        ]);
    }

    public function editVacancy ()
    {
        $data = $this->validate();

        // Verificar si se esta enviando una nueva imagen
        if ( $this->new_image ) {
            $image          = $this->new_image->store('public/vacancies');
            $data['image']  = str_replace('public/vacancies/', '', $image);
        }

        // Consultar vacante a editar en la DB
        $vacancy = Vacancy::find($this->vacancy_id);
        
        // Asignar valores
        $vacancy->title         = $data['title'];
        $vacancy->wage_id       = $data['wage_id'];
        $vacancy->category_id   = $data['category_id'];
        $vacancy->company       = $data['company'];
        $vacancy->last_day      = $data['last_day'];
        $vacancy->description   = $data['description'];
        $vacancy->image         = $data['image'] ?? $vacancy->image;

        // Actualizar datos
        $vacancy->save();

        // Redireccionar al usuario
        session()->flash('message', 'Datos actualizados con éxito');
        return redirect()->route('vacancies.index');
    }
}
