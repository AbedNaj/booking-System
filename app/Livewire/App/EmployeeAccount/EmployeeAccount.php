<?php

namespace App\Livewire\App\EmployeeAccount;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.employee-account')]
class EmployeeAccount extends Component
{
    use \Livewire\WithFileUploads;

    public $name, $email, $phone;
    public $image;
    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email =  Auth::user()->email;
        $this->phone =  Auth::user()->employee->phone;
        $this->image = Auth::user()->employee->image;
    }

    public function save()
    {
        $user = Auth::guard('employee')->user();

        $employeeRoleID = Role::select('id')->where('name', 'Employee')->value('id');

        $validated = $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id)
                    ->where('role_id',  $employeeRoleID)
                    ->where('tenant_id',  $user->tenant_id),
            ],
            'phone' => ['required', 'string', 'max:15'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        $validated['image'] = $this->image
            ? Storage::disk('do')->url($this->image->store(env('DO_DIRECTORY') . "/employee/{$validated['name']}", 'do'))
            : null;


        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $user->employee()->update([
            'phone' => $validated['phone'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'image' => $validated['image'],
        ]);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => __('Employee account updated successfully'),
        ]);
    }
    public function render()
    {
        return view('livewire.app.employee-account.employee-account');
    }
}
