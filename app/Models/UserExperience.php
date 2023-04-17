<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExperience extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "users_experiences";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'company',
        'opportunities_type_id',
        'initial_date',
        'final_date',
        'current_work',
        'user_id',
        'details'
    ];
}
