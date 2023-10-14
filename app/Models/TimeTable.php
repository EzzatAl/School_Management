<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    public $table='time_tables';
    protected $fillable=[
        'grade_id',
        'Year',
        'semester'
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
   public function TimeData()
   {
       return $this->hasMany(TimeTableData::class,'timetables_id');

   }
}
