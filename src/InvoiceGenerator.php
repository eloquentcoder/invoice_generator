<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator;

use DateTimeInterface;
use Eloquentcoder\InvoiceGenerator\Contracts\InvoiceGeneratorContract;
use Eloquentcoder\InvoiceGenerator\ValueObjects\InvoiceNumber;
use Eloquentcoder\InvoiceGenerator\ValueObjects\StringValue;
use Hashids\HashidsInterface;

final class InvoiceGenerator implements InvoiceGeneratorContract
{
    public function __construct(
        private readonly HashidsInterface $hash
    ) {
    }

    public function generate(string $value, DateTimeInterface $date, int $identifier): InvoiceNumber
    {
        return new InvoiceNumber(new StringValue($value), $date, $identifier, $this->hash);
    }
}
