<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'certificate_type',
        'event',
        'date',
        'hours',
        'link',
        'certificate_name',
    ];

    /**
     * Usuário dono desse Certificate
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
