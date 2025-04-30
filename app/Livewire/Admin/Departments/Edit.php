<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;

class Edit extends Component
{
    public $department;

    public function rules()
    {
        return [
            'department.name' => 'required|string|max:255',
            'department.company_id' => 'required|exists:companies,id',
        ];
    }

    public function mount($id)
    {
        $this->department = Department::find($id);
    }

    public function save()
    {
        $this->validate();

        $this->department->save();

        session()->flash('success', 'Department updated successfully.');

        return $this->redirectIntended('departments.index');
    }
    public function render()
    {
        return view('livewire.admin.departments.edit');
    }
}
