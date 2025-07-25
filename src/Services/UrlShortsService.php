<?php

namespace Laravelir\Shorts\Services;

use Laravelir\Shorts\Models\Url;

// builder pattern
class UrlShortsService
{
    public static function short(string $url)
    {
        $existingUrl = Url::where('original_url', $url)->first();

        $token = bcrypt($url);
        Url::create([
            'original_url' => $url,
            'short_url' => '',
            'user_id' => 1,
            'title' => '',
        ]);
    }


    // $shortUrl = ShortURL::destinationUrl('https://ashallendesign.co.uk')->make();
}
