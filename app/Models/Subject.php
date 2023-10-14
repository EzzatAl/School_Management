<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $table = 'subjects';
    protected $fillable =[
        'name'
    ];
    public function TeacherGrades()
    {
        return $this->hasMany(TeacherGradesSubject::class,'subject_id');
    }
    public function TimeData()
    {
        return $this->hasMany(TimeTableData::class,'subject_id');
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class,'subject_id');
    }
    public function Quizzes()
    {
        return $this->hasMany(Quizze::class,'subject_id');
    }
    public function studentMarks()
    {
        return $this->hasMany(StudentMark::class,'subject_id');
    }
}
