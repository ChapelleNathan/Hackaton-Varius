<?php

namespace App\Controller;

use App\Model\RecipeManager;
use App\Model\FavRecipeManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class RecipeController extends AbstractController
{
    public function show()
    {
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->allRecipes();
        $favRecipeManager = new FavRecipeManager();
        $favRecipes = $favRecipeManager->selectAll();
        return $this->twig->render('Recipes/recipes.html.twig', [
            'recipes' => $recipes,
            'favRecipes' => array_column($favRecipes, 'recipe_id')
        ]);
    }

    public function showOneRecipe(int $id): string
    {
        $recipeManager = new RecipeManager();
        $recipe = $recipeManager->oneRecipe($id);
        $ingredients = $recipe['ingredients'];

        return $this->twig->render('Recipe/recipe.html.twig', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }

    public function addFav(): void
    {
        $favRecipeManager = new FavRecipeManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array_map('trim', $_POST);
            $favRecipeManager->add((int)$data['recipe_id']);
            header('Location: /recipes');
        }
    }

    public function remove(): void
    {
        $favRecipeManager = new FavRecipeManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array_map('trim', $_POST);
            $favRecipeManager->delete((int)$data['recipe_id']);
            header('Location: /recipes');
        }
    }

    public function showFav(): string
    {
        $recipeManager = new RecipeManager();
        $favRecipeManager = new FavRecipeManager();
        $allFavs = $favRecipeManager->selectRecipe();
        $favs = [];
        foreach ($allFavs as $fav) {
            $favs[] = $fav['recipe_id'];
        }
        $favRecipes = $recipeManager->allFav($favs);
        return $this->twig->render('Recipes/recipes.html.twig', ['recipes' => $favRecipes]);
    }
}
