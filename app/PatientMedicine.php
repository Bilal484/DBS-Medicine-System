<?php

namespace App;

use App\Models\Patient;
use App\Medicine;
use Illuminate\Database\Eloquent\Model;

class PatientMedicine extends Model
{
    protected $fillable = [
        'patient_id', 'medicine_id', 'quantity_taken', 'time_taken'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
