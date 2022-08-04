<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacancy;

class HomeVacancies extends Component
{
    public $term;
    public $category;
    public $wage;

    protected $listeners = ['searchTerms' => 'search'];

    public function render()
    {
        // $vacancies = Vacancy::all();

        // when: se ejecuta cuando existen valores si no hay no se ejecuta
        $vacancies = Vacancy::when( $this->term, function( $query ){
            $query->where('title', 'LIKE', '%' . $this->term . '%');
        })
            ->when( $this->term, function( $query ) {
                $query->orWhere('company', 'LIKE', '%' . $this->term . '%' );
            })
            ->when( $this->category, function( $query ) {
                $query->where('category_id', $this->category );
            })
            ->when( $this->wage, function( $query ) {
                $query->where('wage_id', $this->wage );
            })
            ->paginate(20);


        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies,
        ]);
    }

    public function search ( $term, $category, $wage )
    {
        $this->term     = $term;
        $this->category = $category;
        $this->wage     = $wage;

    }
}
