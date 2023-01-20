<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'marketing',
        'marking',
        'item',
        'size',
        'qty',
        'harga_custom',
        'harga_kapal',
        'harga_gudang',
        'total',
        'asal',
        'port',
        'kurs',
        'harga_kurs',
        'curs_id',
        'total_invoice_rmb',
        'rate_kurs',
        'keterangan',
        'file',
        'kurs_a',
        'harga_kurs_a',
        'curs_id_a',
        'approve',
        'rate_kurs_a',
        'keterangan_approve',
        'no_bl',
        'no_cont',
        'final',
    ];

    public function curs()
    {
        return $this->belongsTo(Curs::class);
    }

  


    



}
