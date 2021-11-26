<?php

namespace App\Controller;

use App\Model\RecipeManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class TimerController extends AbstractController
{
    public function show(int $id)
    {
        $timerManager = new RecipeManager();
        $timer = $timerManager->oneRecipe($id);

        return $this->twig->render('Timer/_timer.html.twig', ['timer' => $timer]);
    }
}
