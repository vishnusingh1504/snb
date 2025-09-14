<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::whereHas('teacher')->with('teacher')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users',
            'password' => 'required|min:6',
            'teacher_id' => 'required|unique:teachers,teacher_id',
            'image_location' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image_location')) {
            $imagePath = $request->file('image_location')->store('teachers', 'public');
        }

        // Create User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'dob'      => $request->dob,
            'avatar'   => $imagePath,
            'password' => Hash::make($request->password),
        ]);

        // Upload image

        // Create Teacher Profile
        $teacher =  Teacher::create([
            'user_id'        => $user->id,
            'teacher_id'     => $request->teacher_id,
            'qualification'  => $request->qualification,
            'experience'     => $request->experience,
            'specialization' => $request->specialization,
            'mobile_no'      => $request->mobile_no,
            'address'        => $request->address,
            'joining_date'   => $request->joining_date,
            'status'         => $request->status ?? 'active',
            'image_location' => $imagePath,
            'created_by'     => auth()->id(),
            'created_on'     => now(),
        ]);
        $user->assignRole('teacher');

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id,
            'teacher_id' => 'required|unique:teachers,teacher_id,' . $teacher->id,
            'image_location' => 'nullable|image|max:2048',
        ]);

        // Update User
        $teacher->user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'dob'   => $request->dob,
        ]);

        // Handle image update
        $imagePath = $teacher->image_location;
        if ($request->hasFile('image_location')) {
            if ($teacher->image_location && Storage::disk('public')->exists($teacher->image_location)) {
                Storage::disk('public')->delete($teacher->image_location);
            }
            $imagePath = $request->file('image_location')->store('teachers', 'public');
        }

        $teacher->update([
            'teacher_id'     => $request->teacher_id,
            'qualification'  => $request->qualification,
            'experience'     => $request->experience,
            'specialization' => $request->specialization,
            'mobile_no'      => $request->mobile_no,
            'address'        => $request->address,
            'joining_date'   => $request->joining_date,
            'status'         => $request->status,
            'image_location' => $imagePath,
            'last_updated_by'=> auth()->id(),
            'last_modified_on'=> now(),
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->image_location && Storage::disk('public')->exists($teacher->image_location)) {
            Storage::disk('public')->delete($teacher->image_location);
        }
        $teacher->user->delete();
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
