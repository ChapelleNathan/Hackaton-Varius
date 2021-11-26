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
    public const FAV = 'fav_recipe';
    public function allRecipes(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://stark-temple-22847.herokuapp.com/recipes');
        $content = $response->toArray();
        return $content;
    }

    public function oneRecipe(int $id): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://stark-temple-22847.herokuapp.com/recipes/' . $id);
        $content = $response->toArray();
        return $content;
    }

    public function allFav($favRecipes): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://stark-temple-22847.herokuapp.com/recipes');
        $recipes = $response->toArray();
        $favs = [];
        foreach ($recipes as $recipe) {
            if (in_array($recipe['id'], $favRecipes)) {
                $favs[] = $recipe;
            }
        }
        return $favs;
    }
}
