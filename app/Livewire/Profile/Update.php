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
    public $nis;
    public $nisn;
    public $agama;
    public $jeniskelamin;
    public $ttl;
    public $alamat;
    public $nohp;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;

        $biodata = Biodata::where('user_id', Auth::id())->first();
        if ($biodata) {
            $this->nis = $biodata->nis;
            $this->nisn = $biodata->nisn;
            $this->agama = $biodata->agama;
            $this->jeniskelamin = $biodata->jeniskelamin;
            $this->ttl = $biodata->ttl;
            $this->alamat = $biodata->alamat;
            $this->nohp = $biodata->nohp;
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . Auth::id(), // unique rule for users table
            'nis' => 'nullable|min:9|max:9',
            'nisn' => 'nullable|min:10|max:10',
            'agama' => 'required',
            'jeniskelamin' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'nohp' => [
                'required',
                'string',
                'regex:/^(\\62|0)[0-9]{8,14}$/'
            ],
        ]);

        // Update User data
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

        // Update Biodata
        $biodata = Biodata::where('user_id', Auth::id())->first();

        if ($biodata) {
            $biodata->update([
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'agama' => $this->agama,
                'jeniskelamin' => $this->jeniskelamin,
                'ttl' => $this->ttl,
                'alamat' => $this->alamat,
                'nohp' => $this->nohp,
            ]);
        } else {
            Biodata::create([
                'user_id' => Auth::id(),
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'agama' => $this->agama,
                'jeniskelamin' => $this->jeniskelamin,
                'ttl' => $this->ttl,
                'alamat' => $this->alamat,
                'nohp' => $this->nohp,
            ]);
        }

        return redirect()->route('biodata')->with('message', 'Profile berhasil diperbarui.');
    }



    public function render()
    {
        return view('livewire.profile.update');
    }
}
