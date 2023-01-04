<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitActivity extends Model
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
    public static function findFromUnit($unit_id) {
        $activities = self::all();

        // foreach ($activities as $activity) {
        //     if ($activity['unit'] == $unit_id) {
        //         return $activity;
        //     }
        // }
        return self::all()->where('unit', $unit_id)->sortByDesc('created_at');
    }
}
