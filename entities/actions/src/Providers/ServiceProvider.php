<?php

namespace InetStudio\PointsFlowPackage\Actions\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Загрузка сервиса.
     */
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerFormComponents();
    }

    /**
     * Регистрация команд.
     */
    protected function registerConsoleCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                'InetStudio\PointsFlowPackage\Actions\Console\Commands\SetupCommand',
            ]
        );
    }

    /**
     * Регистрация ресурсов.
     */
    protected function registerPublishes(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (Schema::hasTable('points_flow_actions')) {
            return;
        }

        $timestamp = date('Y_m_d_His', time());
        $this->publishes(
            [
                __DIR__.'/../../database/migrations/create_points_flow_actions_tables.php.stub' => database_path(
                    'migrations/'.$timestamp.'_create_points_flow_actions_tables.php'
                ),
            ],
            'migrations'
        );
    }

    /**
     * Регистрация путей.
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Регистрация представлений.
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.points-flow-package.actions');
    }

    /**
     * Регистрация компонентов форм.
     */
    protected function registerFormComponents()
    {
        FormBuilder::component('points_flow_action', 'admin.module.points-flow-package.actions::back.forms.fields.action', ['name' => null, 'value' => null, 'attributes' => null]);
    }
}
