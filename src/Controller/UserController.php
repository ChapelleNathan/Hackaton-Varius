<?php

namespace App\Controller;

use App\Model\DeezerManager;
use App\Model\PlaylistManager;
use App\Model\UserManager;

class UserController extends AbstractController
{
    public function details(int $id): string
    {
        $userManager = new UserManager();
        $playlistManager = new PlaylistManager();
        $user = $userManager->selectOneById($id);
        $playlists = $playlistManager->selectAll('name');
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user['playlist_id'] = trim($_POST['btnradio']);
            $errors = $this->playlistValidator($user, $playlists);
            if (empty($errors)) {
                $userManager->changePlaylist($user);
                header('Location: #validate');
            }
        }
        return $this->twig->render('User/userDetails.html.twig', ['user' => $user, 'playlists' => $playlists]);
    }

    public function playlistValidator(array $user, array $playlists): array
    {
        $errors = [];
        if (!in_array($user['playlist_id'], array_column($playlists, 'id'))) {
            $errors[] = 'We can\'t find the playlist selected';
        }

        return $errors;
    }

    public function show(): string
    {
        $deezerManager = new DeezerManager();
        $userManager = new UserManager();
        $user = $userManager->selectUserPlaylist($_GET['id']);
        $playlist = $deezerManager->searchPlaylist($user);
        return $this->twig->render('deezer/deezer.html.twig', ['id' => $playlist['id']]);
    }
}
