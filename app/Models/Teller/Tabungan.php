<?php

namespace App\Models\Teller;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    protected $table = 'tabungans';
    protected $primaryKey = 'token_tabungan';
    protected $keyType = 'string';
    protected $guarded = ['id_tabungan', 'created_at', 'updated_at'];
    protected $fillable = [
        'token_tabungan',
        'rekening_id',
        'jumlah',
        'jenis',
        'saldo',
        'deskripsi',
        '_teller',
    ];

    public function getRouteKeyName()
    {
        return 'token_tabungan';
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'id_rekening');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, '_teller', 'id');
    }
}
