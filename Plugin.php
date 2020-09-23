<?php

namespace Trad\Gotobackend;

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
        $pathBackend = Backend::url();

        $initJS = <<<JS
            var linkBackend = $('<a>',{
                text: 'goToBackend',
                title: 'Go to Backend',
                href: '{$pathBackend}',
                class: 'gotobackend'
            }).appendTo('body');
        JS;
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
