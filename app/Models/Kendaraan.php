<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';

    // Set primary key menjadi kode_kendaraan
    protected $primaryKey = 'kode_kendaraan';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'kode_kendaraan',
        'nama_kendaraan',
        'desc_kendaraan',
        'cost_kendaraan'
    ];
}