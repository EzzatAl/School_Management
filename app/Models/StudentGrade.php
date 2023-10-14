<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    use HasFactory;
    public $table = 'student_grades';
    protected $fillable = [
        'student_id',
        'grade_id',
        'division_id',
        'year',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

}
