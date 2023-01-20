<?php

namespace App\Http\Livewire;

use App\Models\Partc;
use Livewire\Component;
use Livewire\WithPagination;

class Itnpart extends Component
{

    public $search = '';
    use WithPagination;

    public $post;

    public function mount($id)
    {
        $this->post = Partc::where('id_itn', $id);
    }

    public function render()
    {
        return view('livewire.itnpart', [
            'partcs' => Partc::where('id_itn', $this->id)
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate('10')
        ]);
    }
}
