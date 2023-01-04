<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RegisteredUnits extends Model
{
    use HasFactory;

    // public function students(): BelongsToMany {
    //     return $this->belongsToMany(Student::class, 'students', 'student', 'students');
    // }
    public function units(): BelongsToMany {
        return $this->belongsToMany(Unit::class, 'registered_units', 'id', 'unit');
    }
    
}
