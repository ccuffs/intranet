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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
        'allowed' => 'boolean',
        'fetched_at' => 'datetime',
    ];

    /**
     * Usuário dono desse site
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
