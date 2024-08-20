<?php

namespace App;

class Song
{
  public function sing()
  {
    return $this->verses(99, 0);
  }

  public function verses($start, $end)
  {
    return implode("\n", array_map(
      fn ($number) => $this->verse($number), range($start, $end)
    ));
  }

  public function verse($number)
  {
    switch ($number) {
      case 0:
        return "No more bottles of beer on the wall\nNo more bottles of beer\nGo to the store and buy some more\n99 bottles of beer on the wall\n";
      case 1:
        return "1 bottle of beer on the wall\n1 bottle of beer\nTake one down and pass it around\nNo more bottles of beer on the wall\n";
      case 2:
        return "2 bottles of beer on the wall\n2 bottles of beer\nTake one down and pass it around\n1 bottle of beer on the wall\n";
      default:
        return "$number bottles of beer on the wall\n$number bottles of beer\nTake one down and pass it around\n" . ($number - 1) . " bottles of beer on the wall\n";
    }
  }
}
