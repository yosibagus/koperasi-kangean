<?php

namespace App\Models\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegadaian extends Model
{
    use HasFactory;
    protected $table = 'pegadaians';
    protected $primaryKey = 'token_pegadaian';
    protected $keyType = 'string';
    protected $guarded = ['id_pegadaian', 'created_at', 'updated_at'];
    protected $fillable = [
        'token_pegadaian',
        'rekening_id',
        'gambar_barang',
        'detail_barang',
        'jumlah',
        'bunga',
        'status',
        '_teller'
    ];

    public function getRouteKeyName()
    {
        return 'token_pegadaian';
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'id_rekening');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, '_teller', 'id');
    }

    public function pembayaran()
    {
        return $this->hasMany(PembayaranPegadaian::class, 'pegadaian_id', 'id_pegadaian');
    }
}
