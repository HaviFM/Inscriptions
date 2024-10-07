<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'tel',
        'password',
        'role_id',
    ];

    protected $dates = ['deleted_at'];
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->role_id = $user->role_id ?? 1;
        });
    }
}
