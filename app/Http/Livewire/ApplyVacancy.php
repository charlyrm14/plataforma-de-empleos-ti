<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacancy; 
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCandidate;

class ApplyVacancy extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacancy;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function render()
    {
        return view('livewire.apply-vacancy');
    }

    public function mount ( Vacancy $vacancy )
    {
        $this->vacancy = $vacancy;
    }

    public function applyVacancyForm ()
    {
        $data       = $this->validate();

        // Guarda archivo cv
        $cv             = $this->cv->store('public/cv');
        $data['cv']     = str_replace('public/cv/', '', $cv);

        // Se crea registro
        $this->vacancy->candidates()->create([
            'user_id'   => auth()->user()->id,
            'cv'        => $data['cv'],
        ]);

        // Se crea notificacion y se envia email
        $this->vacancy->recruiter->notify( new NewCandidate( $this->vacancy->id, $this->vacancy->title, auth()->user()->id ) );

        // Muestra mensaje a usuario de postulación éxitosa
        session()->flash('message', '¡Te has postulado con éxito a esta vacante, mucha suerta!');

        return redirect()->back();
    }
}
