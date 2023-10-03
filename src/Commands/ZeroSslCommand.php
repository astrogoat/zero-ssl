<?php

namespace Astrogoat\ZeroSsl\Commands;

use Illuminate\Console\Command;

class ZeroSslCommand extends Command
{
    public $signature = 'zero-ssl';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
