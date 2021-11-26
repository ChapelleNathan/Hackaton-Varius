<?php

namespace App\Model;

use Exception;

class FavRecipeManager extends AbstractManager
{
    public const TABLE = 'fav_recipe';

    public function add(int $id): void
    {
        $query = 'INSERT INTO ' . self::TABLE . ' (recipe_id) VALUES (:recipe_id)';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('recipe_id', $id, \PDO::PARAM_INT);
        try {
            $statement->execute();
        } catch (Exception $e) {
            header('Location: /recipes');
        }
    }

    public function selectRecipe(): array
    {
        $query = 'SELECT recipe_id FROM ' . self::TABLE;
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
