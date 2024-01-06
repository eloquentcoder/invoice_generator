<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator\ValueObjects;

use DateTimeInterface;
use Hashids\HashidsInterface;
use Stringable;

final class InvoiceNumber implements Stringable
{
    public function __construct(
        private readonly StringValue $value,
        private readonly DateTimeInterface $date,
        private readonly int $identifier,
        private HashidsInterface $hash
    ) {
    }

    /**
     * Generate unique invoice number
     *
     * @return string
     */
    public function __toString()
    {
        return "#" . $this->value->getInitials() . "-" . $this->date->format("Y") . "-" . $this->date->format("W") . "-" . $this->hash->encode($this->identifier);
    }
}
