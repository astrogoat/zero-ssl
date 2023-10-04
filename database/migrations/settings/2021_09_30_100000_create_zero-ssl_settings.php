<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('zero-ssl.enabled', false);
    }

    public function down()
    {
        $this->migrator->delete('zero-ssl.enabled');
    }
};
