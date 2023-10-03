<?php

namespace Astrogoat\ZeroSsl\Actions;

use Helix\Lego\Apps\Actions\Action;

class ZeroSslAction extends Action
{
    public static function actionName(): string
    {
        return 'ZeroSsl action name';
    }

    public static function run(): mixed
    {
        return redirect()->back();
    }
}
