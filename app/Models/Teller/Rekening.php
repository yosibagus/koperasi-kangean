<?php

namespace App\Models\Teller;

use App\Models\Admin\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'rekenings';
    protected $primaryKey = 'token_rekening';
    protected $keyType = 'string';
    protected $guarded = ['id_rekening', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'token_rekening';
    }

    public function anggotas()
    {
        return $this->belongsTo(User::class, 'anggota', 'id');
    }

    public function tellers()
    {
        return $this->belongsTo(User::class, 'teller', 'id');
    }

    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'rekening_id', 'id_rekening');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
