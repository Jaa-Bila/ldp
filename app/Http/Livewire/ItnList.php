<?php

namespace App\Http\Livewire;

use App\Models\Itn;
use App\Models\Addr_Itn;
use Livewire\Component;
use Livewire\WithPagination;

class ItnList extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.itn-list', [
            'itns' => Itn::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
