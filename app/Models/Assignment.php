<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    public $table='assignments';
    protected $fillable=[
        'grade_id',
        'subject_id',
        'teacher_id',
        'Day',
        'Name',
        'Description'
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
