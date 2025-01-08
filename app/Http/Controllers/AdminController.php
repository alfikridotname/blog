<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::paginate(10);
        return view('admin', compact('admins'));
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id); // Cari admin berdasarkan ID
        return view('admin_edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $admin = User::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id); // Cari admin berdasarkan ID
        $admin->delete(); // Hapus data admin
        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully!');
    }
}
