<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserIdiom extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "users_idioms";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fluency',
        'idiom_id',
        'user_id',
    ];
}
