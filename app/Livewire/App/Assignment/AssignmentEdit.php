<?php

namespace App\Livewire\App\Assignment;

use App\Models\Assignment;
use Livewire\Component;

class AssignmentEdit extends Component
{

    public  $assignment;
    public $duration_override, $custom_price, $notes;
    public bool $is_available;
    public function mount()
    {
        $assignment = Assignment::select('duration_override', 'custom_price', 'is_available', 'notes')
            ->where('id', $this->assignment)
            ->first();

        $this->duration_override = $assignment->duration_override;
        $this->custom_price = $assignment->custom_price;
        $this->is_available = $assignment->is_available;
        $this->notes = $assignment->notes;
    }

    public function save()
    {

        $this->validate([
            'duration_override' => 'nullable|numeric',
            'custom_price' => 'nullable|numeric',
            'is_available' => 'boolean',
            'notes' => 'nullable|string|max:255',
        ]);
        Assignment::where('id', $this->assignment)
            ->update([
                'duration_override' => $this->duration_override,
                'custom_price' => $this->custom_price,
                'is_available' => $this->is_available,
                'notes' => $this->notes,
            ]);

        session()->flash('success', 'Assignment updated successfully.');
    }
    public function render()
    {


        return view('livewire.app.assignment.assignment-edit');
    }
}
