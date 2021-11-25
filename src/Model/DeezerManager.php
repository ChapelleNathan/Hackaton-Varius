<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class DeezerManager extends AbstractManager
{
    public function searchTrack(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.deezer.com/track/3135556');
        return $response->toArray();
    }

    public function oEmbed($tracks)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.deezer.com/oembed?url=https://www.deezer.com/track/'
            . $tracks[0][1] .
            '&maxwidth=300&maxheight=150');
        return $response->toArray();
    }
}
