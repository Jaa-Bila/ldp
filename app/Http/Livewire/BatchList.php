<?php

namespace App\Http\Livewire;

use App\Models\Batch;
use App\Models\Partc;
use App\Models\Partcp;
use App\Models\Partcr;
use Livewire\Component;
use Livewire\WithPagination;

class BatchList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.batch-list', [
            'batchs' => Batch::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10'),
            'partcs' => Partc::all(),
            'partcrs' => Partcr::all()
        ]);
    }
}
