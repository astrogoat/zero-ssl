<?php

namespace Astrogoat\ZeroSsl\Settings;

use Astrogoat\ZeroSsl\Peripherals\PkiValidationFiles;
use Helix\Lego\Settings\AppSettings;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ZeroSslSettings extends AppSettings
{
    public string $filesystem_disk;

    public function rules(): array
    {
        return [
             'filesystem_disk' => Rule::requiredIf($this->enabled === true),
        ];
    }

    public function filesystemDiskOptions(): array
    {
        return collect(config('filesystems.disks'))
            ->mapWithKeys(fn ($value, $key) => [$key => Str::headline($key)])
            ->toArray();
    }

    protected array $peripherals = [
        PkiValidationFiles::class,
    ];

    public function sections(): array
    {
        return [
            [
                'title' => 'Filesystem Disk',
                'properties' => [
                    'filesystem_disk',
                ],
            ],
        ];
    }

    public function help(): array
    {
        return [
            'filesystem_disk' => 'Where to store the validation files.',
        ];
    }

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
