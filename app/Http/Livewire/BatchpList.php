<?php

namespace App\Http\Livewire;

use App\Models\Partcp;
use App\Models\PBatch;
use Livewire\Component;
use Livewire\WithPagination;

class BatchpList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.batchp-list', [
            'pbatchs' => PBatch::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10'),
            'partcps' => Partcp::all()
        ]);
    }
}
