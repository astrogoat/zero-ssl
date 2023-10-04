<?php

namespace Astrogoat\ZeroSsl;

use Astrogoat\ZeroSsl\Peripherals\PkiValidationFiles;
use Helix\Lego\Apps\App;
use Helix\Lego\LegoManager;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Astrogoat\ZeroSsl\Settings\ZeroSslSettings;

class ZeroSslServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('zero-ssl')
            ->settings(ZeroSslSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations',
                __DIR__ . '/../database/migrations/settings',
            ])
            ->backendRoutes(__DIR__.'/../routes/backend.php')
            ->frontendRoutes(__DIR__.'/../routes/frontend.php');
    }

    public function registeringPackage()
    {
        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(fn (App $app) => $this->registerApp($app));
        });
    }

    public function bootingPackage()
    {
        Livewire::component('astrogoat.zero-ssl.peripherals.pki-validation-files', PkiValidationFiles::class);
    }

    public function configurePackage(Package $package): void
    {
        $package->name('zero-ssl')->hasConfigFile()->hasViews();
    }
}
