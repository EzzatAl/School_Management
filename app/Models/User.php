<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    //dashboard
    public function canAccessFilament(): bool
    {
        return $this->email= 'Ezzat@gmail.com';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'type',
        'image',
        'gender',
        't_phone_number',
        's_father',
        's_mother',
        's_phone_number',
        's_home_number',
        's_address',
        'full_name',
        'random_number'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->random_number === 0) {
                $user->random_number = random_int(10000, 99999);
            }
        });
    }


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
        'password' => 'hashed',
    ];
    public function student()
    {
        return $this->hasMany(StudentGrade::class, 'student_id');
    }
    public function grade()
    {
        return $this->hasMany(StudentGrade::class,'grade_id');
    }
    public function teacher()
    {
        return $this->hasMany(TeacherGradesSubject::class,'teacher_id');
    }
    public function TimeData()
    {
        return $this->hasMany(TimeTableData::class,'teacher_id');
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class,'teacher_id');
    }
    public function quizzes()
    {
        return $this->hasMany(Quizze::class,'teacher_id');
    }
    public function StudentQuizAnswers()
    {
        return $this->hasMany(StudentQuizAnswer::class,'student_id');
    }
    public function studentMarks()
    {
        return $this->hasMany(StudentMark::class,'student_id');
    }

}
