<?php

namespace App\Controller;

use App\Model\RecipeManager;
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
}
