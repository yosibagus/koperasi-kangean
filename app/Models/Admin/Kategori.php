<?php

namespace App\Models\Admin;

use App\Models\Teller\Rekening;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'token_kategori';
    protected $keyType = 'string';
    protected $guarded = ['id_kategori', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'token_kategori';
    }

    public function rekening()
    {
        return $this->hasMany(Rekening::class, 'kategori_id', 'id_kategori');
    }

}
