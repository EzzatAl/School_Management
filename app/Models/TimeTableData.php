<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTableData extends Model
{
    use HasFactory;
    public $table='time_table_data';
    protected $fillable=[
        'timetables_id',
        'subject_id',
        'teacher_id',
        'day',
        'StartFrom',
        'EndIn'
    ];
    public function timetables()
    {
        return $this->belongsTo(TimeTable::class);
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
