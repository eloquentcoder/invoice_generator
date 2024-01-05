<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator\Contracts;

use DateTimeInterface;

interface InvoiceGeneratorContract
{
    public function generate(
        string $value,
        DateTimeInterface $date,
        string|int $identifier
    ): string;
}
