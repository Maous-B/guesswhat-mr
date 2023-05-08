<?php

namespace App\Core;

/**
 * Class Guess : la logique du jeu.
 * @package App\Core
 */
class Guess
{
  /**
   * @var CardGame un jeu de cartes
   */
  private $cardGame;

  /**
   * @var Card c'est la carte à deviner par le joueur
   */
  private $selectedCard;

  /**
   * @var bool pour prendre en compte lors d'une partie
   */
  private $withHelp;

  /**
   * Guess constructor.
   * @param CardGame $cardGame
   * @param Card $selectedCard
   * @param bool $withHelp
   */
  public function __construct(CardGame $cardGame, $selectedCard = null, $withHelp = false)
  {
    $this->cardGame = $cardGame;

    if ($selectedCard) {
      $this->selectedCard = $selectedCard;
    }

    else {
        $numero = rand(0, count($cardGame->getCards()) - 1);

        $this->selectedCard = $cardGame->getCard($numero);
    }

    $this->withHelp = $withHelp;
  }

  public function getWithHelp()
  {
     return $this->withHelp;
  }

  /**
   * @param Card $card une soumission du joueur
   * @return bool true si la carte proposée est la bonne, false sinon
   */
  public function isMatch(Card $card)
  {
    return CardGame::compare($card, $this->selectedCard) === 0;
  }

  public function gameAssist($îndiceNom, $indiceCouleur) : string
  {


      return "Couleur : $couleur. La carte se trouve entre la carte ";
  }


}

