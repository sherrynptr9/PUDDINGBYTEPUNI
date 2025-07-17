<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.account', compact('user'));
    }

    public function edit()
{
    $user = Auth::user();
    return view('user.edit', compact('user'));
}

public function update(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'telepon' => 'nullable|string|max:20',
        'alamat'  => 'nullable|string|max:255',
    ]);

    $user = Auth::user();
    $user->update([
        'name'    => $request->name,
        'telepon' => $request->telepon,
        'alamat'  => $request->alamat,
    ]);

    return redirect()->route('user.account')->with('success', 'Profil berhasil diperbarui.');
}

}
