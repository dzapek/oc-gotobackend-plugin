<?php namespace Trad\Gotobackend;

use Backend;
use System\Classes\PluginBase;

/**
 * gotobackend Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'gotobackend',
            'description' => 'No description provided yet...',
            'author'      => 'trad',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Trad\Gotobackend\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
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

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'gotobackend' => [
                'label'       => 'gotobackend',
                'url'         => Backend::url('trad/gotobackend/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['trad.gotobackend.*'],
                'order'       => 500,
            ],
        ];
    }
}
