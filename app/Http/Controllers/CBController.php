<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CBController extends Controller
{
    public function index()
    {

        Cache::forget('users');

        $users = Cache::remember('users', 600, function () {
            return User::all();
        });

        return view('codebreakers', compact('users'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imagePath,
        ]);

        // Clear cache

        return redirect()->route('cb.index')->with('success', 'User created successfully.');
    }
}
