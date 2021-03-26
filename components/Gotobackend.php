<?php

namespace Trad\Gotobackend\Components;

use File;
use backend;
use Cms\Classes\Theme;
use Cms\Classes\ComponentBase;

class Gotobackend extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'gotobackend Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $themePartialPath =  Theme::getActiveTheme()->getPath() . '/partials/gotobackend';
        $layoutPath = $this->getPath();
        if (File::exists($themePartialPath)) {
            $layoutPath = $themePartialPath;
        }

        $loader = new \Twig\Loader\FilesystemLoader([$layoutPath]);
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('default.htm');

        echo $template->render(['backendUrl' => Backend::url()]);
    }
}
