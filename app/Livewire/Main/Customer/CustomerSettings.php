<?php

namespace App\Livewire\Main\Customer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[layout('layouts.main')]
class CustomerSettings extends Component
{
    public $currentPassword, $newPassword, $newPassword_confirmation;
    public $language = 'en';



    public function updatePassword()
    {

        $validated = $this->validate(
            [
                'currentPassword' => 'required|string',
                'newPassword' => 'required|String|confirmed'

            ]
        );
        $user = Auth::guard('customer')->user();
        if (!Hash::check($validated['currentPassword'], $user->password)) {

            return $this->addError('currentPassword', 'The current password is incorrect.');
        } elseif (Hash::check($validated['newPassword'], $user->password)) {
            return $this->addError('newPassword', 'this password is already in use');
        }

        $user->update([
            'password' => Hash::make($validated['newPassword']),
        ]);
        Session()->flash('message', 'Password Updated Successfully ');

        $this->reset('currentPassword', 'newPassword', 'newPassword_confirmation');
    }


    public function deleteAccount()
    {
        $user = Auth::guard('customer')->user();

        $user->delete();
    }
    public function render()
    {
        return view('livewire.main.customer.customer-settings');
    }
}
