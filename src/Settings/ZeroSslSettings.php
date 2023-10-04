<?php

namespace Astrogoat\ZeroSsl\Settings;

use Astrogoat\ZeroSsl\Peripherals\PkiValidationFiles;
use Helix\Lego\Settings\AppSettings;

class ZeroSslSettings extends AppSettings
{
    protected array $peripherals = [
        PkiValidationFiles::class,
    ];

    public function name(): string
    {
        return 'Zero SSL';
    }

    public function description(): string
    {
        return 'Interact with Zero SSL.';
    }

    public static function group(): string
    {
        return 'zero-ssl';
    }
}
