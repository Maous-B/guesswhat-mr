<?php

namespace App\Tests\Core;

use App\Core\Card;
use App\Core\CardGame;
use PHPUnit\Framework\TestCase;

class CardGameTest extends TestCase
{

  public function testToString2Cards()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique'), new Card('Roi', 'Coeur')]);
    $this->assertEquals('CardGame : 2 carte(s)',$jeudecarte->__toString());
  }

  public function testToString1Card()
  {
    $jeudecarte = new CardGame([new Card('As', 'Pique')]);
    $this->assertEquals('CardGame : 1 carte(s)',$jeudecarte->__toString());
  }

  public function testCompare()
  {
      $card1 = new Card('as', 'pique');
      $card2 = new Card('as', 'pique');
      $jeudecarte = new CardGame([$card1, $card2]);
      $this->assertEquals(0, $jeudecarte->compare($card1, $card2));
  }

  public function testShuffle()
  {
      $jeudecarte = new CardGame(CardGame::factory52Cards());
      $cartesMelangees = $jeudecarte->shuffle($jeudecarte->getCards());
      $this->assertEquals($cartesMelangees, $jeudecarte->shuffle($jeudecarte->getCards()));
  }

  public function testGetCard()
  {
      $jeudecarte = new CardGame(CardGame::factory52Cards());
      $this->assertEquals('as de trefle', $jeudecarte->getCard(0));
  }

  public function testFactoryCardGame32()
  {
    $paquet = CardGame::factory32Cards();
    $this->assertEquals(32, count($paquet));
  }

}
