<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase {

  public function test_it_evaluates_an_empty_string_as_0() {
    $calc = new StringCalculator;
    $this->assertSame(0, $calc->add(''));
  }

  public function test_it_finds_the_sum_of_a_single_number() {
    $calc = new StringCalculator;
    $this->assertSame(5, $calc->add('5'));
  }

  public function test_it_finds_the_sum_of_two_numbers() {
    $calc = new StringCalculator;
    $this->assertSame(10, $calc->add('5,5'));
  }

  public function test_it_finds_the_sum_of_any_amount_of_numbers() {
    $calc = new StringCalculator;
    $this->assertSame(25, $calc->add('5,5,5,5,5'));
  }

  public function test_it_accepts_a_new_line_character_as_a_delimiter() {
    $calc = new StringCalculator;
    $this->assertSame(10, $calc->add("5\n5"));
  }

  public function test_negative_numbers_are_not_allowed() {
    $calc = new StringCalculator;
    $this->expectException(InvalidArgumentException::class);
    $calc->add('5,-5');
  }

  public function test_numbers_greater_than_1000_are_ignored() {
    $calc = new StringCalculator;
    $this->assertSame(5, $calc->add('5,1001'));
  }

  public function test_it_supports_custom_delimiters() {
    $calc = new StringCalculator;
    $this->assertSame(10, $calc->add("//;\n5;5"));
  }

}
