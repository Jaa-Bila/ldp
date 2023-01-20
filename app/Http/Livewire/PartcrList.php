<?php

namespace App\Http\Livewire;

use App\Models\Partcr;
use Livewire\Component;
use Livewire\WithPagination;

class PartcrList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.partcr-list', [
            'partcrs' => Partcr::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
