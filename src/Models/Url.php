<?php

namespace Laravelir\Shorts\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Url extends Model
{

    protected $table = 'laravelir_shorts';

    // protected $fillable = ['uuid', 'short_url', 'original_url', 'visits'];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate(4);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
