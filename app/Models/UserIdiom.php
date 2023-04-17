<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Idiom;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserIdiom extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "users_idioms";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fluency',
        'idiom_id', // B = BASIC, I = INTERMEDIARY, A = ADVANCED, F = FLUENT
        'user_id',
    ];

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function idiom () : BelongsTo
    {
        return $this->belongsTo(Idiom::class, 'idiom_id');
    }
}
