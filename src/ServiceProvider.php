<?php

namespace Sjorsvanleeuwen\BootstrapComponents;

use Form;
use Html;

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

        $this->defineFormComponents();
        $this->defineHtmlComponents();
    }

    public function defineFormComponents()
    {
        Form::component('bsInputText', 'bc::form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsInputEmail', 'bc::form.email', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsInputCheckbox', 'bc::form.checkbox', ['name', 'label' => null, 'value' => 1, 'checked' => null, 'attributes' => []]);
        Form::component('bsInputPassword', 'bc::form.password', ['name', 'label' => null, 'attributes' => []]);
        Form::component('bsInputSelect', 'bc::form.select', ['name', 'label' => null, 'options' => [], 'value' => null, 'attributes' => [], 'optionAttributes' => []]);
        Form::component('bsInputRange', 'bc::form.range', ['name', 'label' => null, 'min' => 0, 'max' => 100, 'value' => null, 'attributes' => []]);
        Form::component('bsInputStatic', 'bc::form.static', ['label', 'value']);
        Form::component('bsFormActionButtons', 'bc::form.action_buttons', ['cancelUrl']);
    }

    public function defineHtmlComponents()
    {
        Html::component('bsActionLink', 'bc::html.action_link', ['url', 'title', 'type', 'show_title' => true, 'show_icon' => true, 'attributes' => []]);
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

        $this->app->extend('html', function($html, $app) {
            return new HtmlBuilder($app['url'], $app['view']);
        });
    }
}
