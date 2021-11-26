<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class DeezerManager extends AbstractManager
{
    public function searchPlaylist(array $playlist): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $playlist['url']);
        return $response->toArray();
    }
}
