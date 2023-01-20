<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curs extends Model
{
    use HasFactory;


    protected $table = 'curs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mata_uang',
        'nilai',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

   

  

    



}
