<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentActivity extends Model
{
    use HasFactory;
    public static function find($id) {
        $activities = self::all();

        foreach ($activities as $activity) {
            if ($activity['id'] == $id) {
                return $activity;
            }
        }
    }
    public static function findFromDepartment($department_id) {
        $activities = self::all();

        // foreach ($activities as $activity) {
        //     if ($activity['unit'] == $department_id) {
        //         return $activity;
        //     }
        // }
        return self::all()->where('department_id', $department_id)->sortByDesc('created_at');
    }
}
