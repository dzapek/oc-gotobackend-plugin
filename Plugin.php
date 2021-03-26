<?php

namespace Trad\Gotobackend;

use Event;
use Backend;
use DOMDocument;
use System\Classes\PluginBase;
use Twig;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Trad\Gotobackend\Components\Gotobackend' => 'Gotobackend',
        ];
    }

    public function boot()
    {
        Event::listen('cms.page.postprocess', function ($controller, $url, $page, $dataHolder) {
            $page->attributes['Gotobackend'] = [];
            $page->save();
        });
    }
}
