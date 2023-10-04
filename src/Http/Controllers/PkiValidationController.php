<?php

namespace Astrogoat\ZeroSsl\Http\Controllers;

use Astrogoat\ZeroSsl\Settings\ZeroSslSettings;
use Illuminate\Support\Facades\Storage;

class PkiValidationController
{
    public function show(string $id)
    {
        abort_unless(ZeroSslSettings::isEnabled(), 404);

        return Storage::get("/.well-known/pki-validation/{$id}");
    }
}
