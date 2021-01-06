<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'enabled',
        'allowed',
        'serve_url',
        'source_url',
        'source_type',
        'fetch_status',
        'fetch_error',
        'fetched_at'
    ];

    /**
     * Usuário dono desse site
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
