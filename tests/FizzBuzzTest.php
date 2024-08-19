<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase {

  public function test_it_returns_fizz_for_multiple_of_three() {
    $fizzBuzz = new FizzBuzz;
    foreach ([3, 6, 9, 12] as $number) {
      $this->assertEquals('fizz', $fizzBuzz->execute($number));
    }
  }

  public function test_it_returns_buzz_for_multiple_of_five() {
    $fizzBuzz = new FizzBuzz;
    foreach ([5, 10, 20, 25] as $number) {
      $this->assertEquals('buzz', $fizzBuzz->execute($number));
    }
  }

  public function test_it_returns_fizzbuzz_for_multiple_of_three_and_five() {
    $fizzBuzz = new FizzBuzz;
    foreach ([15, 30, 45, 60] as $number) {
      $this->assertEquals('fizzbuzz', $fizzBuzz->execute($number));
    }
  }

  public function test_it_returns_empty_string_for_other_numbers() {
    $fizzBuzz = new FizzBuzz;
    foreach ([1, 2, 4, 7, 8, 11, 13, 14, 16] as $number) {
      $this->assertEquals($number, $fizzBuzz->execute($number));
    }
  }

}
