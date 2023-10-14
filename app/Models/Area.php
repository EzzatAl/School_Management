<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public $table ='areas';
    protected  $fillable =[
        'name' 
    ];
    public function AreaBusse()
    {
        return $this->hasMany(AreaBuss::class,'area_id');
    }
}
