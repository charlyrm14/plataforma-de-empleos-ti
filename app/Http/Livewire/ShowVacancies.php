<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacancy;

class ShowVacancies extends Component
{

    protected $listeners = ['deleteVacancy'];

    public function render()
    {
        $vacancies = Vacancy::where( 'user_id', auth()->user()->id )->paginate(10);

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies,
        ]);
    }

    public function deleteVacancy( Vacancy $vacancy )
    {       
        $vacancy->delete();
    }
}
