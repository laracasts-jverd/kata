<?php

use App\Song;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{

  public function test_it_get_the_ninety_nine_bottles_verse() {
    $expected = <<<EOT
      99 bottles of beer on the wall
      99 bottles of beer
      Take one down and pass it around
      98 bottles of beer on the wall

      EOT;
    $result = (new Song)->verse(99);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_ninety_eight_bottles_verse() {
    $expected = <<<EOT
      98 bottles of beer on the wall
      98 bottles of beer
      Take one down and pass it around
      97 bottles of beer on the wall

      EOT;
    $result = (new Song)->verse(98);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_forty_five_bottles_verse() {
    $expected = <<<EOT
      45 bottles of beer on the wall
      45 bottles of beer
      Take one down and pass it around
      44 bottles of beer on the wall

      EOT;
    $result = (new Song)->verse(45);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_two_bottles_verse() {
    $expected = <<<EOT
      2 bottles of beer on the wall
      2 bottles of beer
      Take one down and pass it around
      1 bottle of beer on the wall

      EOT;
    $result = (new Song)->verse(2);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_one_bottle_verse() {
    $expected = <<<EOT
      1 bottle of beer on the wall
      1 bottle of beer
      Take one down and pass it around
      No more bottles of beer on the wall

      EOT;
    $result = (new Song)->verse(1);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_no_more_bottles_verse() {
    $expected = <<<EOT
      No more bottles of beer on the wall
      No more bottles of beer
      Go to the store and buy some more
      99 bottles of beer on the wall

      EOT;
    $result = (new Song)->verse(0);
    $this->assertEquals($expected, $result);
  }

  public function test_it_get_the_lyrics()
  {
    $expected = file_get_contents(__DIR__ . '/stubs/lyrics.stub');
    $result = (new Song)->sing();
    $this->assertEquals($expected, $result);
  }
}
