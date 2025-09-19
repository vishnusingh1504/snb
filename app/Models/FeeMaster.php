<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeMaster extends Model {
    use HasFactory;
    protected $guarded = [];

    public function subscriptions() {
        return $this->hasMany(StudentSubscription::class);
    }
}
