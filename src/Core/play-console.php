<?php

require '../../vendor/autoload.php';

echo " ==== Quel nombre de cartes voulez-vous ? ==== \n ==== 1. Jeu de 32 cartes ==== \n ==== 2. Jeu de 52 cartes ==== \n";

$choixJeu = readline();

while($choixJeu > 2 or $choixJeu < 1)
{
    echo " Erreur de saisie. Veuillez recommencer : \n";
    $choixJeu = readline();
}

if($choixJeu == 1)
{
    $cardGame = new App\Core\CardGame(App\Core\CardGame::factory32Cards());
}
else
{
    $cardGame = new App\Core\CardGame(App\Core\CardGame::factory52Cards());
}

echo " ==== Voulez-vous de l'aide ? ==== \n ==== 1. Oui ==== \n ==== 2. Non ==== \n";

$choixAide = readline();

while($choixAide > 2 or $choixAide < 1)
{
    echo " Erreur de saisie. Veuillez recommencer : \n";
    $choixAide = readline();
}

if($choixAide == 1)
{
    $assistance = true;
}
else
{
    $assistance = false;
}

echo " ==== Instanciation du jeu, début de la partie. ==== \n";
echo " ==== Choix aléatoire de la carte ==== \n";
$carteChoisieAuHasard = rand(0, count($cardGame->getCards()) - 1);
$game =  new App\Core\Guess($cardGame, $carteChoisieAuHasard, $assistance);
echo $cardGame->getCard($carteChoisieAuHasard);

echo " ==== Choix du nombre d'essais. ==== \n";

echo "Combien d'essais ? :";
$essais = readline();


echo "=== Choix de carte === \n";


while($essais > 0)
{

    if($essais = $essais / 2 and $game->getWithHelp() == true)
    {
        echo "L'aide a été déclenchée. Voici votre indice : ";
        echo  $game->gameAssist();
    }
    echo "Nom : ";
    $nomCarte = readline();
    echo "Couleur : ";
    $couleurCarte = readline();
    $carteChoisie = new \App\Core\Card($nomCarte, $couleurCarte);

    if($game->isMatch($carteChoisie))
    {
        echo "Bravo ! La carte était belle et bien $carteChoisie\n";
        break;
    }
    else
    {
        $essais--;
        echo "Loupé ! Il vous reste $essais\n";
    }
}

if($essais == 0)
{
    echo "Perdu ! La carte était $carteChoisie";
}

echo " ==== Fin prématurée de la partie ====\n";
echo "*** Terminé ***\n";
