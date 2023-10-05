<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('zero-ssl.enabled', false);
        $this->migrator->add('zero-ssl.filesystem_disk', '');
    }

    public function down()
    {
        $this->migrator->delete('zero-ssl.enabled');
        $this->migrator->delete('zero-ssl.filesystem_disk');
    }
};
