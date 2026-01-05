<?php

namespace App\Models\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPegadaian extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_pegadaians';
    protected $primaryKey = 'token_pg';
    protected $keyType = 'string';
    protected $guarded = ['id_pembayaran_pinjaman', 'created_at', 'updated_at'];
    protected $fillable = [
        'token_pg',
        'pegadaian_id',
        'jumlah',
        '__teller',
    ];

    public function getRouteKeyName()
    {
        return 'token_pg';
    }

    public function pegadaian()
    {
        return $this->belongsTo(Pegadaian::class, 'pegadaian_id', 'id_pegadaian');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, '__teller', 'id');
    }
}
