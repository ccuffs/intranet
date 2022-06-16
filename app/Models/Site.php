<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

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
        'update_now',
        "created_at",
        "updated_at"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
        'allowed' => 'boolean'
    ];

    /**
     * Usuário dono desse site
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Informações sobre o build desse website.
     */
    public function buildInfo()
    {
        $url_fmt = config('sites.api_status_url');
        $url = sprintf($url_fmt, $this->id);

        return Http::get($url)->json();
    }
}
