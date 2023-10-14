<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;
    public $table='quizzes';
    protected $fillable =[
        'subject_id',
        'teacher_id',
        'grade_id',
        'Name',
        'Day',
        'Type',
        'TotalMark'
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function QuizQuestions()
    {
        return $this->hasMany(QuizQuestion::class,'quizze_id');
    }

}
