<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public static function find($id) {
        $schools = self::all();

        foreach ($schools as $school) {
            if ($school['id'] == $id) {
                return $school;
            }
        }
    }
}
