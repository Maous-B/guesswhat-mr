<?php

namespace App\Core;

/**
 * Class CardGame32 : un jeu de cartes.
 * @package App\Core
 */
class CardGame32
{

  const ORDER_COLORS = ['coeur' => 4, 'carreau' => 3, 'pique' => 2, 'trèfle' => 1 ];
  const ORDER_NAMES = [
    '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6,
    '7' => 7, '8' => 8, '9' => 9, '10' => 10,
    'valet' => 11, 'reine' => 12, 'roi' => 13, 'as' => 14 ];

  /**
   * @var $cards array a array of Cards
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
   * Brasse le jeu de cartes
   */
  public function shuffle()
  {
    // TODO (voir les fonctions sur les tableaux)
  }

  // TODO ajouter une méthode reOrder qui remet le paquet en ordre


  /** définir une relation d'ordre entre instance de Card.
   * à valeur égale (name) c'est l'ordre de la couleur qui prime
   * coeur > carreau > pique > trèfle
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
    // TODO code naïf, et de plus il faudra prendre en compte la couleur !

    $c1Name = strtolower($c1->getName());
    $c2Name = strtolower($c2->getName());

    if ($c1Name === $c2Name) {
        return 0;
    }
    return ($c1Name > $c2Name) ? +1 : -1;
  }


  public static function factoryCardGame32() : CardGame32 {
     // TODO création d'un jeu de 32 cartes
    $cardGame = new CardGame32([new Card('As', 'Trèfle'), new Card('2', 'Trèfle')]);

    return $cardGame;
  }

  public function getCard($index) : Card {
    return  $this->cards[$index];
  }

}

