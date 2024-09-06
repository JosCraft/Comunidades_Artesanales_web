<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = ['id','name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'rolesuser');
    }

}
