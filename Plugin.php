<?php

namespace Trad\Gotobackend;

use Twig;
use Block;
use Event;
use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        Event::listen('cms.page.beforeDisplay', function ($controller) {
            $pluginPath = plugins_path() . 'trad/gotobackend';
            $controller->addCss($pluginPath . '/assets/gotobackend.css');
            $this->initJs();
        });
    }

    private function initJs()
    {
        $backendUrl = Backend::url();
        $viewsPath = plugins_path() . 'trad/gotobackend/views/default';

        $html = Twig::parse($viewsPath, ['backendUrl' => $backendUrl]);

        Block::append('scripts', '<script>' . $initJS . '</script>');
    }

    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'trad.gotobackend.some_permission' => [
                'tab' => 'gotobackend',
                'label' => 'Some permission'
            ],
        ];
    }
}
