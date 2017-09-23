<?php

namespace Sjorsvanleeuwen\BootstrapComponents;

use Form;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineResources();

        $this->defineComponents();
    }

    public function defineComponents()
    {
        Form::component('bsInputText', 'bc::form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsInputSelect', 'bc::form.select', ['name', 'label' => null, 'options' => [], 'value' => null, 'attributes' => [], 'optionAttributes' => []]);
        Form::component('bsInputRange', 'bc::form.range', ['name', 'label' => null, 'min' => 0, 'max' => 100, 'value' => null, 'attributes' => []]);
        Form::component('bsFormActionButtons', 'bc::form.action_buttons', ['cancelUrl']);
    }

    /**
     * Define the resources for the package.
     *
     * @return void
     */
    protected function defineResources()
    {
        $this->loadViewsFrom(BC_PATH.'/resources/views', 'bc');
        $this->loadTranslationsFrom(BC_PATH.'/resources/lang', 'bc');

        if ($this->app->runningInConsole())
        {
            $this->defineViewPublishing();
            $this->defineTranslationsPublishing();
            $this->defineAssetPublishing();
        }
    }

    /**
     * Define the view publishing configuration.
     *
     * @return void
     */
    public function defineViewPublishing()
    {
        $this->publishes([
            BC_PATH . '/resources/views' => resource_path('views/vendor/bc'),
        ], 'views');
    }

    /**
     * Define the translation publishing configuration.
     *
     * @return void
     */
    public function defineTranslationsPublishing()
    {
        $this->publishes([
            BC_PATH . '/resources/lang' => resource_path('lang/vendor/bc'),
        ], 'translations');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            BC_PATH . '/resources/assets/sass' => resource_path('assets/sass/bc'),
        ], 'sass');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if(!defined('BC_PATH'))
        {
            define('BC_PATH', realpath(__DIR__.'/../'));
        }
    }
}
