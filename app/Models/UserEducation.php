<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Institution;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "users_education";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'score',
        'description',
        'initial_date',
        'final_date',
        'current_education',
        'institution_id',
        'user_id'
    ];


    public function institution () : BelongsTo
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

}
