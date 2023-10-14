<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherGradesSubject extends Model
{
    use HasFactory;
    public $table = 'teacher_grades_subjects';
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'division_id',
        'grade_id',
    ];
    public function teacher()
    {
        return $this->belongsTo(User::class)->where('type','teacher');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
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
