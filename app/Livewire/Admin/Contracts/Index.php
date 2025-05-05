<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function delete($id)
    {
        Contract::find($id)->delete();
        session()->flash('success', 'Contract deleted successfully.');
        return $this->redirectIntended(route('contracts.index'),true);
    }

    public function render()
    {
        return view('livewire.admin.contracts.index', [
            'contracts' => Contract::inCompany()->paginate(5),
        ]);
    }
}
