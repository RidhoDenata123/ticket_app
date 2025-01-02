<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    // Set primary key menjadi kode_ticket
    protected $primaryKey = 'kode_ticket';

    // Jika primary key bukan auto-incrementing
    public $incrementing = false;

    // Jika primary key bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'kode_ticket',
        'id_user',
        'kode_tujuan',
        'kode_jadwal',
        'kode_kendaraan',
        'ticket_price',
        'cost_kendaraan',
        'total_tagihan',
        'tgl_order',
        'tgl_bayar',
        'status_ticket',
        'kode_verifikasi',
    ];
}