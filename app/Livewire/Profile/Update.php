<?php

namespace App\Livewire\Profile;

use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Update extends Component
{
    public $name;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . Auth::id(), // unique rule for users table
        ]);

        // Update User data
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

        

        return redirect()->route('profile.edit')->with('message', 'Profile berhasil diperbarui.');
    }



    public function render()
    {
        return view('livewire.profile.update');
    }
}
