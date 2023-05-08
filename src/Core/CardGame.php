<?php

namespace App\Core;

use phpDocumentor\Reflection\Types\Integer;

/**
 * Class CardGame : un jeu de cartes.€€€€€
 * @package App\Core
 */
class CardGame
{
  /**
   * Relation d'ordre sur les couleurs
   */
   const ORDER_COLORS =['trefle'=> 1, 'carreau'=>2, 'coeur'=>3, 'pique'=>4];
   const ORDER_NAMES =['as' => 0, 'deux' => 1, 'trois' => 2, 'quatre' => 3, 'cinq' => 4, 'six' => 5, 'sept' => 6, 'huit' => 7, 'neuf' => 8, 'dix' => 9, 'valet' => 10, 'dame' => 11, 'roi' => 12];

  /**
   * @var $cards array of Cards
   */
  private $cards;

  /**
   * Guess constructor.
   * @param array $cards
   */
  public function __construct(array $cards)
  {
    $this->cards = $cards;
  }

  /**
   * Brasse le jeu de cartes (mélanger)
   */
  public function shuffle(array $paquetDeCartes) : array
  {
      $cartesMelangees = shuffle($paquetDeCartes);
      return $cartesMelangees;
  }

  public function reOrder(array $paquetDeCartes) : array
  {
    $cartesRangees = $this->getCards();
    return $cartesRangees;
  }

  /** définir une relation d'ordre entre instance de Card.
   * à valeur égale (name) c'est l'ordre de la couleur qui prime
   * pique > coeur > carreau > trèfle
   * Attention : si AS de Coeur est plus fort que AS de Trèfle,
   * 2 de Coeur sera cependant plus faible que 3 de Trèfle
   *
   *  Remarque : cette méthode n'est pas de portée d'instance (static)
   *
   * @see https://www.php.net/manual/fr/function.usort.php
   *
   * @param $c1 Card
   * @param $c2 Card
   * @return int
   * <ul>
   *  <li> zéro si $c1 et $c2 sont considérés comme égaux </li>
   *  <li> -1 si $c1 est considéré inférieur à $c2</li>
   * <li> +1 si $c1 est considéré supérieur à $c2</li>
   * </ul>
   *
   */
  public static function compare(Card $c1, Card $c2) : int
  {

    $c1Name = strtolower($c1->getName());
    $c2Name = strtolower($c2->getName());

    $c1Color = strtolower($c1->getColor());
    $c2Color = strtolower($c2->getColor());

    if ($c1Name === $c2Name) {
        if($c1Color === $c2Color)
        {
            return 0;
        }
        else
        {
            return (self::ORDER_COLORS[$c1Color] > self::ORDER_COLORS[$c2Color] ? +1 : -1);
        }
        return 0;
    }
      return (self::ORDER_NAMES[$c1Name] > self::ORDER_NAMES[$c2Name] ? +1 : -1);
  }

  /**
   * Création automatique d'un paquet de 32 cartes
   * (afin de simplifier son instanciation)
   * @return array of Cards
   */

  // 52 CARTES
  public static function factory52Cards() : array {
    foreach(self::ORDER_NAMES as $name => $valName)
    {
        foreach(self::ORDER_COLORS as $color => $valColor)
            {
                $cards[] = new Card($name, $color);
            }
    }
    return $cards;
  }

  public static function factory32Cards() : array {
      foreach(self::ORDER_NAMES as $name => $valName)
      {
          foreach(self::ORDER_COLORS as $color => $valColor)
          {
              if($valName >= 6 or $valName < 1)
                  {
                      $cards[] = new Card($name, $color);
                  }
          }
      }
      return $cards;
  }
  public function getCard(int $index) : Card {
    return  $this->cards[$index];
  }

  public function getCardName(int $index) : string
  {
      return $this->cards[$index][0];
  }

    public function getCardColor(int $index) : string
    {
        return $this->cards[$index][1];
    }


    /**
   * @see https://www.php.net/manual/fr/language.oop5.magic.php#object.tostring
   * @return string
   */
  public function __toString()
  {
    return 'CardGame : '.count($this->cards).' carte(s)';
  }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

}

