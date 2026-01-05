<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'token_profile';
    protected $keyType = 'string';
    protected $guarded = ['id_profile', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'token_profile';
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_profile', 'profile_id');
    }
}
