<?php

namespace Agungsp\FilamentCleaveInput\Tests;

use Agungsp\FilamentCleaveInput\FilamentCleaveInputServiceProvider;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        if (isset($_SERVER['GITHUB_ACTIONS'])) {
            set_error_handler(function ($errno, $errstr, $errfile) {
                if (str_contains($errstr, '.env') && str_contains($errfile, 'vendor')) {
                    return true;
                }

                return false;
            }, E_WARNING);
        }

        parent::setUp();

        if (isset($_SERVER['GITHUB_ACTIONS'])) {
            restore_error_handler();
        }

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Agungsp\\FilamentCleaveInput\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ActionsServiceProvider::class,
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            LivewireServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            FilamentCleaveInputServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-cleave-input_table.php.stub';
        $migration->up();
        */
    }
}
