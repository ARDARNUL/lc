<?php

namespace Providers;

use Src\Provider\AbstractProvider;
use Src\Settings;
use Src\Validator\Validator;


class KernelProvider extends AbstractProvider
{
    private array $settings = [];

    public function register(): void
    {
        $this->settings = $this->getConfigs(__DIR__ . '/../../config');
    }

    public function boot(): void
    {
        $settings = new Settings($this->settings);

        $this->app->bind('settings', $settings);
        $settings->app['validators'];
    }

    //Функция, возвращающая массив всех настроек приложения
    private function getConfigs(string $path = ''): array
    {
        $settings = [];
        foreach (scandir($path) as $file) {
            $name = explode('.', $file)[0];
            if (!empty($name)) {
                $settings[$name] = include "$path/$file";
            }
        }
        return $settings;
    }
}