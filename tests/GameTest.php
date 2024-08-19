<?php

use App\Game;
use PHPUnit\Framework\TestCase;

// Bowling Game Kata
class GameTest extends TestCase {

  public function test_it_scores_a_gutter_game_as_zero() {
    $game = new Game;
    foreach (range(1, 20) as $roll) {
      $game->roll(0);
    }
    $this->assertSame(0, $game->score());
  }

  public function test_it_scores_a_gutter_game_as_one() {
    $game = new Game;
    foreach (range(1, 20) as $roll) {
      $game->roll(1);
    }
    $this->assertSame(20, $game->score());
  }

  public function test_it_awards_a_one_roll_bonus_for_every_spare() {
    $game = new Game;
    $game->roll(5);
    $game->roll(5); // spare
    $game->roll(8); // bonus roll because of spare
    foreach (range(1, 17) as $roll) {
      $game->roll(0);
    }
    $this->assertSame(26, $game->score());
  }

  public function test_it_awards_two_roll_bonus_for_a_strike() {
    $game = new Game;
    $game->roll(10); // strike
    $game->roll(5);
    $game->roll(2);
    foreach (range(1, 16) as $roll) {
      $game->roll(0);
    }
    $this->assertSame(24, $game->score());
  }

  public function test_a_spare_on_the_final_frame_grants_an_extra_ball() {
    $game = new Game;
    foreach (range(1, 18) as $roll) {
      $game->roll(0);
    }
    $game->roll(5);
    $game->roll(5); // spare
    $game->roll(5);
    $this->assertSame(15, $game->score());
  }

  public function test_a_strike_on_the_final_frame_grants_two_extra_balls() {
    $game = new Game;
    foreach (range(1, 18) as $roll) {
      $game->roll(0);
    }
    $game->roll(10); // strike
    $game->roll(10);
    $game->roll(10);
    $this->assertSame(30, $game->score());
  }

  public function test_it_scores_a_perfect_game() {
    $game = new Game;
    foreach (range(1, 12) as $roll) {
      $game->roll(10);
    }
    $this->assertSame(300, $game->score());
  }

}
