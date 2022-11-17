<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function booted() {
        static::creating(function($model) {
            $model->id = Str::uuid()->toString();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'status',
        'client_id',
        'clp_usd',
        'expires_at',        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => "datetime:Y-m-d H:i:s",
    ];

    public function user() {
        return $this->belongsTo(User::class, 'client_id'); // Many-to-one relationship with users model
    }
}
