<?php

use App\RomanNumerals;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase {

  #[DataProvider('checks')]
  public function test_it_generates_roman_numeral($number, $expected) {
    $this->assertEquals($expected, (RomanNumerals::generate($number)));
  }

  public static function checks() {
    return [
      [1, 'I'],
      [2, 'II'],
      [3, 'III'],
      [4, 'IV'],
      [5, 'V'],
      [6, 'VI'],
      [9, 'IX'],
      [27, 'XXVII'],
      [48, 'XLVIII'],
      [59, 'LIX'],
      [93, 'XCIII'],
      [141, 'CXLI'],
      [163, 'CLXIII'],
      [402, 'CDII'],
      [575, 'DLXXV'],
      [911, 'CMXI'],
      [1024, 'MXXIV'],
      [3000, 'MMM']
    ];
  }
}
