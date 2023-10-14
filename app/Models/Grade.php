<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public $table ='grades';
    protected $fillable=
        [
            'division_id',
            'name'
        ];
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function StudentGrade()
    {
        return $this->hasMany(TeacherGradesSubject::class,'grade_id');
    }
    public function TeacherGrades()
    {
        return $this->hasMany(TeacherGradesSubject::class,'grade_id');
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class,'grade_id');
    }
    public function TimeTables()
    {
        return $this->hasMany(TimeTable::class,'grade_id');
    }
    public function Quizzes()
    {
        return $this->hasMany(Quizze::class,'grade_id');
    }
}
