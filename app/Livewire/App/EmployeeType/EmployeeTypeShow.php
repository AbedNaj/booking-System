<?php

namespace App\Livewire\App\EmployeeType;

use App\Models\EmployeeTypes;
use Livewire\Component;

class EmployeeTypeShow extends Component
{
    public $editing = false;
    public $name, $description;
    public EmployeeTypes $employeeTypes;


    public function enableEdit()
    {
        $this->name = $this->employeeTypes->name;
        $this->description = $this->employeeTypes->description;

        $this->editing = true;
    }


    public function save(): void
    {

        $validated = $this->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string']

        ]);

        $this->employeeTypes->update(
            [

                'name' => $validated['name'],
                'description' => $validated['description']
            ]
        );

        $this->editing = false;

        session()->flash('success', __('employee-types.updateSuccess'));
    }


    public function render()
    {
        return view('livewire.app.employee-type.employee-type-show');
    }
}
