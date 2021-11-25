<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectUserPlaylist(int $id)
    {

        $query = 'SELECT url ' .
            'FROM ' . self::TABLE . ' AS u ' .
            'JOIN ' . PlaylistManager::TABLE . ' AS p ' .
            'ON u.playlist_id = p.id ' .
            'WHERE u.id = :id';
        $statement = $this->pdo->prepare($query);

        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
