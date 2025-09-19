<?php

use App\Models\Employee;
use App\Models\Student;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRoute extends Model {
    use HasFactory;
    protected $guarded = [];

    public function driver() {
        return $this->belongsTo(Employee::class, 'id');
    }
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
