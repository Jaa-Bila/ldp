<?php

namespace App\Http\Livewire;

use App\Models\Partcp;
use Livewire\Component;
use Livewire\WithPagination;

class PartcpList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.partcp-list', [
            'partcps' => Partcp::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
