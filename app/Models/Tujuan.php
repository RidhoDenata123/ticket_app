<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $table = 'tujuans';

    // Set primary key menjadi kode_tujuan
    protected $primaryKey = 'kode_tujuan';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'kode_tujuan',
        'nama_tujuan',
        'desc_tujuan',
        'ticket_price',
    ];
}