<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CBController extends Controller
{
    public function index()
    {
        $users = Cache::remember('users', 60, function () {
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

        $imagePath = $request->file('image')->store('public/images');
        
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $imagePath,
        ]);

        // Clear the cache
        // Cache::forget('users');

        return redirect()->route('cb.index')->with('success', 'User created successfully.');
    }
}
