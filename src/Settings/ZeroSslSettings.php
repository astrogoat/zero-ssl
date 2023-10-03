<?php

namespace Astrogoat\ZeroSsl\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;
use Astrogoat\ZeroSsl\Actions\ZeroSslAction;

class ZeroSslSettings extends AppSettings
{
    // public string $url;

    public function rules(): array
    {
        return [
            // 'url' => Rule::requiredIf($this->enabled === true),
        ];
    }

    // protected static array $actions = [
    //     ZeroSslAction::class,
    // ];

    // public static function encrypted(): array
    // {
    //     return ['access_token'];
    // }

    public function description(): string
    {
        return 'Interact with ZeroSsl.';
    }

    public static function group(): string
    {
        return 'zero-ssl';
    }
}
