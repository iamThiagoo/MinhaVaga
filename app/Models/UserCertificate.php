<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCertificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "users_certificates";

    protected $dates = ["deleted_at"];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'initial_date',
        'final_date',
        'code_certificate',
        'url_certificate',
        'institution_id',
        'user_id'
    ];

    public function institution () : BelongsTo
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

}
