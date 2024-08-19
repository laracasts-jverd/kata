<?php

namespace App;

use InvalidArgumentException;

class StringCalculator
{

  const MAX_NUMBER_ALLOWED = 1000;
  private $delimiter = ',|\n';

  public function add(string $numbers): int
  {
    $numbers = $this->parse($numbers);
    $this->disallowNegatives($numbers);
    return array_sum($this->filterIgnoredNumbers($numbers));
  }

  private function filterIgnoredNumbers(array $numbers): array
  {
    return array_filter($numbers, fn ($number) => $number <= self::MAX_NUMBER_ALLOWED);
  }

  private function disallowNegatives(array $numbers)
  {
    foreach ($numbers as $number) {
      if ((int) $number < 0) {
        throw new InvalidArgumentException('Negative numbers are not allowed.');
      }
    }
  }

  private function parse(string $numbers): array
  {
    $customDelimiterCheck = "\/\/(.)\n";
    if (preg_match("/{$customDelimiterCheck}/", $numbers, $matches)) {
      $this->delimiter = $matches[1];
      $numbers = str_replace($matches[0], '', $numbers);
    }
    return preg_split("/{$this->delimiter}/", $numbers);
  }
}
