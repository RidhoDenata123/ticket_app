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

     // Definisikan relasi ke model User
        public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }

    // Definisikan relasi ke model Tujuan
        public function tujuan()
        {
            return $this->belongsTo(Tujuan::class, 'kode_tujuan');
        }

    // Definisikan relasi ke model Kendaraan
        public function kendaraan()
        {
            return $this->belongsTo(Kendaraan::class, 'kode_kendaraan');
        }

    // Definisikan relasi ke model jadwal
        public function jadwal()
        {
            return $this->belongsTo(Jadwal::class, 'kode_jadwal');
        }
}