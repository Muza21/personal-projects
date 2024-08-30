<?php

use Core\Validator;

test('validates the string value', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

test('validates a string with a minimum length', function () {
    expect(Validator::string('foobar', 5))->toBeTrue();
    expect(Validator::string('foobar', 10))->toBeFalse();
});

test('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::string('foobar@example.com'))->toBeTrue();
});
