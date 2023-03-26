<?php

namespace PlutuLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Plutu\Services\PlutuSadad;
use Plutu\Services\PlutuAdfali;
use Plutu\Services\PlutuLocalBankCards;
use Plutu\Services\PlutuTlync;
use Plutu\Services\PlutuMpgs;
use Illuminate\Foundation\Console\AboutCommand;

class PlutuServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerServices();
        $this->mergeConfigFrom(__DIR__ . '/../../config/plutu.php', 'plutu');
    }

    /**
     * Register the package services in the container.
     *
     * @return void
     */
    protected function registerServices(): void
    {
        $this->registerService(PlutuSadad::class, ['api_key', 'access_token']);
        $this->registerService(PlutuAdfali::class, ['api_key', 'access_token']);
        $this->registerService(PlutuLocalBankCards::class, ['api_key', 'access_token', 'secret_key']);
        $this->registerService(PlutuTlync::class, ['api_key', 'access_token', 'secret_key']);
        $this->registerService(PlutuMpgs::class, ['api_key', 'access_token', 'secret_key']);
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/plutu.php' => config_path('plutu.php'),
        ], 'config');

        $this->registerAboutPlutuPackage();
    }

    /**
     * Register the "about" command for the package.
     *
     * @return void
     */
    protected function registerAboutPlutuPackage(): void
    {
        AboutCommand::add('Plutu Laravel', function () {
            return [
                'Version' => '1.1.0'
            ];
        });
    }

    /**
     * Register a service in the container.
     *
     * @param string $service
     * @param array $configKeys
     * @return void
     */
    protected function registerService(string $service, array $configKeys): void
    {
        $this->app->singleton($service, function ($app) use ($service, $configKeys) {
            $config = $this->getConfig($configKeys);
            return (new $service)->setCredentials(...$config);
        });
    }

    /**
     * Get the configuration values.
     *
     * @param array $configKeys
     * @return array
     */
    protected function getConfig(array $configKeys): array
    {
        return array_map(function ($key) {
            return config("plutu.$key");
        }, $configKeys);
    }
}
