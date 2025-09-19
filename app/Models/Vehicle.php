<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    use HasFactory;
    protected $fillable = [
        'name', 'vehicle_type', 'make', 'model', 'registration_number', 'capacity',
        'insurance_provider', 'policy_number', 'insurance_coverage_type', 'insurance_expiry_date',
        'pollution_certificate_expiry_date', 'fitness_certificate_expiry_date', 'road_tax_paid_up_to',
    ];

    public function transportRoutes() {
        return $this->hasMany(TransportRoute::class);
    }
}
