<?php

namespace App\Models\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPinjaman extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_pinjamans';
    protected $primaryKey = 'token_pp';
    protected $keyType = 'string';
    protected $guarded = ['id_pembayaran_pinjaman', 'created_at', 'updated_at'];
    protected $fillable = [
        'token_pp',
        'pinjaman_id',
        'jumlah',
        '__teller'
    ];

    public function getRouteKeyName()
    {
        return 'token_pp';
    }

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class, 'pinjaman_id', 'id_pinjaman');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, '__teller', 'id');
    }
}
