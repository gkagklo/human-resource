<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Edit extends Component
{
    public $contract;
    public $search = '';
    public $department_id;

    public function rules()
    {
        return [
            'contract.designation_id' => 'required',
            'contract.employee_id' => 'required',
            'contract.start_date' => 'required|date',
            'contract.end_date' => 'required|date|after:contract.start_date',
            'contract.rate_type' => 'required',
            'contract.rate' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ];
    }

    public function mount($id)
    {
        $this->contract = Contract::find($id);
        $this->department_id = $this->contract->designation->department_id ?? null;
    }

    public function save()
    {  
        $this->validate();
        if ($this->contract->employee->getActiveContract($this->contract->start_date, $this->contract->end_date)) {
            throw ValidationException::withMessages([
                'contract.start_date' => 'This employee already has an active contract during this period.',
            ]);
        }
        $this->contract->save();
        session()->flash('success', 'Contract updated successfully.');
        return $this->redirectIntended(route('contracts.index'),true);
    }

    public function selectEmployee($id)
    {
        $this->contract->employee_id = $id;
        $this->search = $this->contract->employee->name;
    }

    public function render()
    {
        $departments = Department::inCompany()->get();
        $designations = $this->department_id ? Department::find($this->department_id)->designations : [];
        $employees = Employee::inCompany()->searchByName($this->search)->get();
        return view('livewire.admin.contracts.edit', [
            'departments' => $departments,
            'designations' => $designations,
            'employees' => $employees,
        ]);
    }
}
