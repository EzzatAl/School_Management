<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
    public $table = 'student_marks';
    protected $fillable = [
        'student_id',
        'subject_id',
        'TotalMark',
    ];
    public function student()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
