<?php

namespace Trad\Gotobackend;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Support\Facades\Event;

/**
 * gotobackend Plugin Information File
 */
class Plugin extends PluginBase
{
    public function boot()
    {
        Event::listen('cms.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addCss($this->pathToPlugin . '/assets/gotobackend.css');
        });
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
