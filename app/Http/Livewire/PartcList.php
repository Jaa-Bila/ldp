<?php

namespace App\Http\Livewire;

use App\Models\Partc;
use Livewire\Component;
use Livewire\WithPagination;

class PartcList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.partc-list', [
            'partcs' => Partc::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
