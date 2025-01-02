<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';

    // Set primary key menjadi kode_jadwal
    protected $primaryKey = 'kode_jadwal';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'kode_jadwal',
        'jam_berangkat',
        'jam_tiba',
        'desc_jadwal',
    ];
}