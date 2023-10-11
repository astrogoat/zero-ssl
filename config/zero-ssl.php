<?php

return [
    'pki_validation' => [
        'central' => [
            'filesystem_disk' => env('ZERO_SSL_PKI_VALIDATION_CENTRAL_DISK', 'local'),
        ]
    ]
];
