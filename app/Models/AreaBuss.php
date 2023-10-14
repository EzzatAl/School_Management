<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaBuss extends Model
{
    use HasFactory;
    public $table ='area_busses'; 
    protected $fillable =[
        'area_id',
        'TimeMorningArrived',
        'TimeAfterNoonArrived',
        'Type'
    ];
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
