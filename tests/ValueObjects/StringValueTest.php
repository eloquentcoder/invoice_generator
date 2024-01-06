<?php

declare(strict_types=1);

use Eloquentcoder\InvoiceGenerator\ValueObjects\StringValue;

it('the return statement should be a string', function (string $value): void {
    $object = new StringValue($value);
    expect($object->getInitials())->toBeString();
})->with('values');

it('returns two characters from a value', function (string $value): void {
    $object = new StringValue($value);
    $string = $object->getInitials();
    expect(mb_strlen($string))->toBeInt()->toEqual(2);
})->with('values');

it("it throws an exception if the value is not long enough", function (): void {
    $object = new StringValue("A");
    $string = $object->getInitials();
})->throws(InvalidArgumentException::class);

it('it removes whitespace from the string when generating', function (): void {
    $object = new StringValue(" Allison");
    $string = $object->getInitials();
    expect($string)->toEqual("AL");
});
