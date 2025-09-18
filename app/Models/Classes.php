<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'numeric',
    ];

    public function students()
{
    return $this->hasMany(Student::class);
}

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

}
