<?php

namespace App;

class FizzBuzz
{

  public function execute($number) {
    $result = "";
    $number % 3 === 0 ? $result .= "fizz" : 0;
    $number % 5 === 0 ? $result .= "buzz" : 0;
    return $result ?: $number;
  }

}
