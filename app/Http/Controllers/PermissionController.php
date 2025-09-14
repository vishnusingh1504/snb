<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource and a form to create new ones.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        // Create the permission
        Permission::create($validated);

        // Redirect back with a success message
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }
}
