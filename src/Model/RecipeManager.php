<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

/**
 * Abstract class handling default manager.
 */
class RecipeManager
{
    public function allRecipes(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://stark-temple-22847.herokuapp.com/recipes');
        $content = $response->toArray();
        return $content;
    }
}
