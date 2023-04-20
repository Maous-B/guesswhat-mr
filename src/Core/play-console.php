<?php

require '../../vendor/autoload.php';

echo "*** Création d'un jeu de 32 cartes.***\n";
$cardGame = new App\Core\CardGame(App\Core\CardGame::factory32Cards());

echo " ==== Instanciation du jeu, début de la partie. ==== \n";
$game =  new App\Core\Guess($cardGame, $cardGame->getCard(0), false);

$userCardIndex = readline("Entrez une position de carte dans le jeu : ");

echo "=== Choix de carte === \n";

$nomCarte = readline("Nom : ");
$couleurCarte = readline("Couleur : ");

$carteChoisie = new \App\Core\Card($nomCarte, $couleurCarte);
echo $carteChoisie;

while(1)
{
    if($game->isMatch($carteChoisie))
    {
        echo " Bravo ! \n";
        break;
    }
    else
    {
        echo " Loupé !\n";
        $nomCarte = readline("Nom : ");
        $couleurCarte = readline("Couleur : ");
    }
}
// code naïf, car aucun contrôle de validité de $userCardIndex...
$userCard = $cardGame->getCard($userCardIndex);


echo " ==== Fin prématurée de la partie ====\n";
echo "*** Terminé ***\n";