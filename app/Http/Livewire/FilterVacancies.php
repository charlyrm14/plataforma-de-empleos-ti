<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Wage;


class FilterVacancies extends Component
{

    public $term;
    public $category;
    public $wage;

    public function render()
    {

        $wages          = Wage::all();
        $categories     = category::all();


        return view('livewire.filter-vacancies', [
            'wages'         => $wages,
            'categories'    => $categories
        ]);
    }

    public function formDataSearch ()
    {
        // Hacia componente padre
        $this->emit('searchTerms', $this->term, $this->category, $this->wage );
    }
}
