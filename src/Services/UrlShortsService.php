<?php

namespace Laravelir\Shorts\Services;

use Laravelir\Shorts\Models\Url;

class UrlShortsService
{
    public static function short(string $url)
    {
        $existingUrl = Url::where('original_url', $url)->first();


        Url::create([
            'original_url' => $url,
            'short_url' => '',
            'user_id' => 1,
            'title' => '',
        ]);
    }
}
