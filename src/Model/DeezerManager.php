<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class DeezerManager extends AbstractManager
{
    public function searchPlaylist(array $playlist): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $playlist['url']);
        return $this->oEmbed($response->toArray());
    }

    private function oEmbed(array $playlist): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.deezer.com/oembed?url=https://www.deezer.com/playlist/'
            . $playlist['id'] .
            '&maxwidth=800&maxheight=300&tracklist=true');
        return $response->toArray();
    }
}
