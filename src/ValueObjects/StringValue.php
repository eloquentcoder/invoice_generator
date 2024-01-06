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

    /**
     * Generate an immutable string representation
     *
     * @return string
     */
    public function getInitials(): string
    {
        $trimmed_value = trim($this->value);

        if (mb_strlen($trimmed_value) <= 1) {
            throw new InvalidArgumentException("Cannot pass a string of length 1");
        }

        if ($this->checkIfInitialCharacterIsNumber($trimmed_value)) {
            throw new InvalidArgumentException("Cannot pass a number as an initial character");
        }

        $words = explode(' ', $trimmed_value);
        if (count($words) > 1) {
            return $this->getEncodedSubstring($words[0], 1) . $this->getEncodedSubstring($words[1], 1);
        }

        return $this->getEncodedSubstring($trimmed_value, 2);
    }

    private function checkIfInitialCharacterIsNumber(string $value)
    {
        $words = explode(' ', $value);
        foreach ($words as  $word) {
            $initial_value = mb_substr($word, 0, 1, 'utf-8');
            if (preg_match("/[0-9]/", $initial_value)) {
                return true;
            }
        }

        return false;
    }

    private function getEncodedSubstring(string $value, int $length): string
    {
        return mb_strtoupper(mb_substr($value, 0, $length, 'utf-8'), 'utf-8');
    }
}
