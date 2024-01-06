<?php

declare(strict_types=1);

return [
    'hasher' => [
        'min-length' => env('INVOICE_HASHER_MIN_LENGTH', 5),
    ]
];
