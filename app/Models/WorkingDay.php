<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    use HasFactory;
    public $table='working_days';
    protected $fillable=[
        'day',
        'StartFrom',
        'EndIn'
    ];
}
