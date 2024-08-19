<?php

namespace App\GildedRose;

class Sulfura extends Item
{
  public function tick()
  {
    $this->sellIn = $this->sellIn;
    $this->quality = $this->quality;
  }
}
