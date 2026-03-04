<?php


//require - attack - a
require('a-laser.php');
require('a-missili.php');
require('a-raggiorepulsore.php');

//require - defence - d
require('d-armaturainvisibile.php');
require('d-parataveloce.php');
require('d-scudoenergetico.php');

//require - move - m
require('m-camminataveloce.php');
require('m-velocitasupersonica.php');
require('m-volo.php');



// CLASSE PRINCIPALE


class IronManMk1 {

    public $attack; 
    public $defence;
    public $move;

    public static $counter = 0;

    public function __construct(Attack $attack, Defence $defence, Move $move) {

        $this->attack = $attack;
        $this->defence = $defence;
        $this->move = $move;

        self::$counter++;
    }

    public function ironManAttack() {
        $this->attack->attack();
    }

    public function ironManDefence() {
        $this->defence->defence();
    }

    public function ironManMove() {
        $this->move->move();
    }

    public static function getCounter() {
        return self::$counter;
    }
}


// CREAZIONE CASUALE


class IronManFactory {

    public static function create() {

        $attacks = [Laser::class, Missili::class, RaggioRepulsore::class];
        $defences = [ScudoEnergetico::class, ArmaturaInvisibile::class, ParataVeloce::class];
        $moves = [Volo::class, CamminataVeloce::class, VelocitaSupersonica::class];

        $attackClass = $attacks[array_rand($attacks)];
        $defenceClass = $defences[array_rand($defences)];
        $moveClass = $moves[array_rand($moves)];

        return new IronManMk1(
            new $attackClass(),
            new $defenceClass(),
            new $moveClass()
        );
    }
}



// CREAZIONE ARMATURE CASUALI


for ($i = 0; $i < 42; $i++) {

    $ironman = IronManFactory::create();

    echo "IRONMAN MK#" . IronManMk1::getCounter() . "\n";

    $ironman->ironManAttack();
    $ironman->ironManDefence();
    $ironman->ironManMove();

    echo "-----------------------------\n";
}

echo "Totale armature create: " . IronManMk1::getCounter() . "\n";