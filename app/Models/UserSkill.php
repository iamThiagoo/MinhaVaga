<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Skill;

class UserSkill extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "users_skills";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_id', 
        'user_id'
    ];

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skill () : BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

}
