<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Classes;
use App\Models\AcademicSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $students = User::role('student') // Spatie role
            ->with('student')
            ->paginate(10);
            // dd($students);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::orderBy('id')->get();
        $sessions = AcademicSession::orderByDesc('is_active')->get();
        return view('students.create', compact('classes', 'sessions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'dob' => 'nullable|date',
            'image_location' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image_location')) {
            $imagePath = $request->file('image_location')->store('students', 'public');
        }

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'avatar' => $imagePath,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->roles);

        // Upload image if any

        // Create Student profile
        Student::create([
            'user_id' => $user->id,
            'student_id' => $request->student_id,
            'pen_number' => $request->pen_number,
            'adhar_no' => $request->adhar_no,
            'dob' => $request->dob,
            'caste' => $request->caste,
            'religion' => $request->religion,
            'admission_class' => $request->admission_class,
            'admission_date' => $request->admission_date,
            'stream' => $request->stream,
            'current_class' => $request->current_class,
            'prev_school' => $request->prev_school,
            'mobile_no' => $request->mobile_no,
            'father_name' => $request->father_name,
            'father_adhar' => $request->father_adhar,
            'father_occu' => $request->father_occu,
            'father_mobile' => $request->father_mobile,
            'mother_name' => $request->mother_name,
            'mother_adhar' => $request->mother_adhar,
            'mother_occu' => $request->mother_occu,
            'mother_mobile' => $request->mother_mobile,
            'address' => $request->address,
            'admission_session' => $request->admission_session,
            'current_session' => $request->current_session,
            'image_location' => $imagePath,
            'status' => $request->status ?? 'active',
            'created_by' => auth()->id(),
            'created_on' => now(),
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'image_location' => 'nullable|image|max:2048',
        ]);

        // Update user
        $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
        ]);

        // Handle image update
        $imagePath = $student->image_location;
        if ($request->hasFile('image_location')) {
            if ($student->image_location && Storage::disk('public')->exists($student->image_location)) {
                Storage::disk('public')->delete($student->image_location);
            }
            $imagePath = $request->file('image_location')->store('students', 'public');
        }

        // Update student record
        $student->update(array_merge(
            $request->except(['name', 'email', 'password']),
            ['image_location' => $imagePath, 'last_updated_by' => auth()->id(), 'last_modified_on' => now()]
        ));

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        if ($student->image_location && Storage::disk('public')->exists($student->image_location)) {
            Storage::disk('public')->delete($student->image_location);
        }
        $student->user->delete();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
