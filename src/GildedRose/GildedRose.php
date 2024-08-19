<?php

namespace App\GildedRose;

use InvalidArgumentException;

// This class is a factory for creating the correct item class
class GildedRose
{
  // lookup table for item classes
  private static $items = [
    'normal' => Item::class,
    'Aged Brie' => Brie::class,
    'Sulfuras, Hand of Ragnaros' => Sulfura::class,
    'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
    'Conjured Mana Cake' => ConjuredManaCake::class,
  ];

  public static function of($name, $quality, $sellIn)
  {
    if (!array_key_exists($name, self::$items)) {
      throw new InvalidArgumentException('Item not found');
    }
    $class = self::$items[$name];
    return new $class($quality, $sellIn);
  }
}
