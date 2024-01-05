<?php

namespace Eloquentcoder\InvoiceGenerator\ValueObjects;

use DateTimeInterface;
use Eloquentcoder\InvoiceGenerator\ValueObjects\StringValue;

final class InvoiceNumber
{
    public function __construct(
        private readonly StringValue $value,
        private readonly DateTimeInterface $date,
        private readonly string|int $identifier
    ) {
    }
}
