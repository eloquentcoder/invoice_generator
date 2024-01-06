<?php

declare(strict_types=1);

use Eloquentcoder\InvoiceGenerator\InvoiceGenerator;
use Eloquentcoder\InvoiceGenerator\ValueObjects\InvoiceNumber;
use Hashids\Hashids;

it('can generate an invoice number', function (string $value) {
    $generator = new InvoiceGenerator(new Hashids(
        minHashLength: 5
    ));

    expect($generator->generate($value, new DateTimeImmutable(), 1))->toBeInstanceOf(InvoiceNumber::class);
})->with('values');
