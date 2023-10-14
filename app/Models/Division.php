<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public $table ='divisions';
    protected $fillable=
    [
    'name'
    ];
    public function grade()
    {
        return $this->hasMany(Grade::class,'division_id');
    }
    public function Studentgrade()
    {
        return $this->hasMany(StudentGrade::class,'division_id');
    }
    public function TeacherGradeSubject()
    {
        return $this->hasMany(TeacherGradesSubject::class,'division_id');
    }
}
