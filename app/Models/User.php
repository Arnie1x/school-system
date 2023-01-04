<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Application;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function student(): HasOne {
        return $this->hasOne(Student::class, 'user_id');
    }
    public function lecturer(): HasOne {
        return $this->hasOne(Lecturer::class, 'user_id');
    }
    public function staff(): HasOne {
        return $this->hasOne(Staff::class, 'user_id');
    }
    public function application(): HasOne {
        return $this->hasOne(Application::class, 'user_id', 'id');
    }
    public function admin(): HasOne {
        return $this->hasOne(Administrator::class, 'user_id');
    }
    public function toString($id) {
        $user = User::find($id);
        return $user->name;
    }
    public function getUser($id) {
        $user = User::find($id);
        return $user;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
