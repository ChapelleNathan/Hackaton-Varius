<?php

namespace App\Controller;

use App\Model\RecipeManager;
use App\Model\DeezerManager;
use App\Model\UserManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class RecipeController extends AbstractController
{
    public function show()
    {
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->allRecipes();

        return $this->twig->render('Recipes/recipes.html.twig', ['recipes' => $recipes]);
    }

    public function showOneRecipe(int $id): string
    {

        $deezerManager = new DeezerManager();
        $userManager = new UserManager();
        $user = $userManager->selectUserPlaylist(1);
        $playlistId = $deezerManager->searchPlaylist($user);
        $recipeManager = new RecipeManager();
        $recipe = $recipeManager->oneRecipe($id);
        $ingredients = $recipe['ingredients'];

        return $this->twig->render('Recipe/recipe.html.twig', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'playlistId' => $playlistId['id']
        ]);
    }
}
