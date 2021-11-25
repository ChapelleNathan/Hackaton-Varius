<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class DeezerManager extends AbstractManager
{
    public function searchPlaylist(string $playlist)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $playlist);
        return $response->toArray();
    }

    public function oEmbed($tracks)
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.deezer.com/oembed?url=https://www.deezer.com/playlist/'
            . $tracks['id'] .
            '&maxwidth=300&maxheight=150');
        return $response->toArray();
    }
}
