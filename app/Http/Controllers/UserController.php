<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user', [
            "title" => "User",
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'alamat' => 'required',
            'nohp' => 'required|numeric|unique:users,nohp',
            'level' => 'required|in:admin,kasir,manager',
        ]);

        User::create($user);
        return redirect('/user')->with('success', 'Data added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect('user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validdata = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'alamat' => 'required',
            'nohp' => 'required|numeric|unique:users,nohp,' . $user->id,
            'level' => 'required|in:admin,kasir,manager',
        ]);

        if ($request->password) {
            $validdata['password'] = bcrypt($request->password);
        } else {
            unset($validdata['password']);
        }

        $user->update($validdata);
        return redirect('/user')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data deleted successfully!');
    }
}
