<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public static function find($id) {
        $departments = self::all();

        foreach ($departments as $department) {
            if ($department['id'] == $id) {
                return $department;
            }
        }
    }
}
