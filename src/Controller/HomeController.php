<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\DeezerManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $deezerManager = new DeezerManager();
        $player = $deezerManager->oEmbed($deezerManager->searchTrack());
        return $this->twig->render('Home/index.html.twig', ['player' => $player]);
    }
}
