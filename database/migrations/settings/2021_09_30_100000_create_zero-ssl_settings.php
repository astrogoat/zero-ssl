<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateZeroSslSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('zero-ssl.enabled', false);
        // $this->migrator->add('zero-ssl.url', '');
        // $this->migrator->addEncrypted('zero-ssl.access_token', '');
    }

    public function down()
    {
        $this->migrator->delete('zero-ssl.enabled');
        // $this->migrator->delete('zero-ssl.url');
        // $this->migrator->delete('zero-ssl.access_token');
    }
}
