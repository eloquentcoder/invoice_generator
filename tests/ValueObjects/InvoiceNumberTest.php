<?php

declare(strict_types=1);

use Eloquentcoder\InvoiceGenerator\ValueObjects\InvoiceNumber;
use Eloquentcoder\InvoiceGenerator\ValueObjects\StringValue;
use Hashids\Hashids;

it('can return a valid invoice number', function ($value) {
    $invoice_number = new InvoiceNumber($word = new StringValue($value), $date = new DateTimeImmutable(), 394, new Hashids(minHashLength: 5));
    expect($invoice_number)->toBeInstanceOf(InvoiceNumber::class)->and((string)$invoice_number)->toBeString()->toContain('#')->toContain($word->getInitials())->toContain($date->format('Y'))->toContain($date->format('W'));
})->with('values');

it('can merge a valid regex', function (string $value) {
    $invoice_number = new InvoiceNumber(new StringValue($value), new DateTimeImmutable(), 1, new Hashids(minHashLength: 5));
    $is_valid = (bool) preg_match('/^#[A-Z]{2}-[0-9]{4}-[0-9]{2}-[A-Za-z0-9]{5,}/', (string) $invoice_number);
    expect($is_valid)->toBeTrue();
})->with('values');
