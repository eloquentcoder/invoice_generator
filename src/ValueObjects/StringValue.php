<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator\ValueObjects;

use InvalidArgumentException;

final class StringValue
{
    public function __construct(
        private readonly string $value
    ) {
    }

    public function getInitials(): string
    {
        if (mb_strlen($this->value) <= 1) {
            throw new InvalidArgumentException("Cannot pass a string of length 1");
        }

        $trimmed_value = trim($this->value);

        $words = explode(' ', $trimmed_value);
        if (count($words) > 1) {
            return $this->getEncodedSubstring($words[0], 1) . $this->getEncodedSubstring($words[1], 1);
        }

        return $this->getEncodedSubstring($trimmed_value, 2);
    }


    private function getEncodedSubstring(string $value, int $length): string
    {
        return mb_strtoupper(mb_substr($value, 0, $length, 'utf-8'), 'utf-8');
    }
}
