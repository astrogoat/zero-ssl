<?php

use Astrogoat\ZeroSsl\Http\Controllers\PkiValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/.well-known/pki-validation/{id}', [PkiValidationController::class, 'show']);
