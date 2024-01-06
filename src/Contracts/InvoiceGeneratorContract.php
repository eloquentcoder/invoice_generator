<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator\Contracts;

use DateTimeInterface;
use Eloquentcoder\InvoiceGenerator\ValueObjects\InvoiceNumber;

interface InvoiceGeneratorContract
{
    public function generate(
        string $value,
        DateTimeInterface $date,
        int $identifier
    ): InvoiceNumber;
}
