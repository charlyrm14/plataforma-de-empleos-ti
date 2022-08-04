<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacancy;
use App\Models\Wage;
use App\Models\Category;
use Livewire\WithFileUploads;


class CreateVacancy extends Component
{
    use WithFileUploads;

    public $title;
    public $wage_id;
    public $category_id;
    public $company;
    public $last_day;
    public $description;
    public $image;

    protected $rules = [
        'title'         => 'required|string',
        'wage_id'       => 'required',
        'category_id'   => 'required',
        'company'       => 'required',
        'last_day'      => 'required',
        'description'   => 'required',
        'image'         => 'required|image|max:1024',
    ];

    public function render()
    {
        $wages      = Wage::all();
        $categories = Category::all();

        return view('livewire.create-vacancy', [
            'wages'         => $wages,
            'categories'    => $categories
        ]);
    }

    public function createVacancy ()
    {
        $data = $this->validate();

        // Guardar imagen
        $image      = $this->image->store('public/vacancies');
        $imageName  = str_replace('public/vacancies/', '', $image);

        // Guardar nueva vacante
        Vacancy::create([
            'title'         => $data['title'],
            'wage_id'       => $data['wage_id'],
            'category_id'   => $data['category_id'],
            'company'       => $data['company'],
            'last_day'      => $data['last_day'],
            'description'   => $data['description'],
            'image'         => $imageName,
            'user_id'       => auth()->user()->id,
        ]);

        // Mensaje de confirmación
        session()->flash('message', 'Vacante creada con éxito');

        // Reedirección a vacantes
        return redirect()->route('vacancies.index');
    }
}
