<?php

namespace App\Tests\Core;

use App\Core\CardGame;
use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardTest extends TestCase
{

  public function testName()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('As', $card->getName());
    $card = new Card('2', 'Trèfle');
    $this->assertEquals('2', $card->getName());

  }

  public function testColor()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('Trèfle', $card->getColor());
    $card = new Card('As', 'Pique');
    $this->assertEquals('Pique', $card->getColor());
  }

  public function testCompareSameCard()
  {
    $card1 = new Card('As', 'Trèfle');
    $card2 = new Card('As', 'Trèfle');
    $this->assertEquals(0, CardGame::compare($card1,$card2));
  }

  public function testCompareSameNameNoSameColor()
  {
      $card1 = new Card('As', 'Trefle');
      $card2 = new Card('As', 'Carreau');
    // TODO
    //$this->fail("not implemented !");
      $this->assertNotEquals(0, CardGame::compare($card1, $card2), "ça devrait être différent.");
      $this->assertEquals(-1, CardGame::compare($card1, $card2), "ça devrait être différent.");

      $card1 = new Card('As', 'Carreau');
      $card2 = new Card('As', 'Trefle');

      $this->assertNotEquals(0, CardGame::compare($card1, $card2), "ça devrait être différent.");
      $this->assertEquals(1, CardGame::compare($card1, $card2), "ça devrait être différent.");

  }

  public function testCompareNoSameNameSameColor()
  {
      $card1 = new Card('Valet', 'trefle');
      $card2 = new Card('Dix', 'trefle');

      $this->assertEquals(1, CardGame::compare($card1, $card2), 'le 2 de pique ne renvoie pas -1');
  }

  // NO SAME NAME NO SAME COLOR
  public function testCompareNoSameNameNoSameColor()
  {
      $card1 = new Card('valet', 'Pique');
      $card2 = new Card('dix', 'Trefle');
    // TODO
      $this->assertEquals(1, CardGame::compare($card1, $card2), 'le 2 de pique ne renvoie pas -1');
  }

  // TEST LES STRINGS
  public function testToString()
  {
    // TODO vérifie que la représentation textuelle
    // d'une carte est conforme à ce que vous attendez
      $card1 = new Card('Valet', 'trefle');
      $this->assertEquals("Valet de trefle", $card1->__toString(), "ne renvoie pas valet de trefle");
  }

}
