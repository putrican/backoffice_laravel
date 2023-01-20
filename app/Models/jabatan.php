<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table ="jabatan ";
    protected $primaryKey = "id";

    protected $fillable = ['id','jabatan'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
