<?php

namespace App\TestExercises;

use RuntimeException;

class Exercises
{
    public function racineCarree(float $nombre): float {
        if ($nombre < 0) {
            throw new RuntimeException("La racine carrée d'un nombre négatif n'est pas définie.");
        }
        return sqrt($nombre);
    }

    public function diviser(int $dividende, int $diviseur): float {
        if ($diviseur === 0) {
            throw new RuntimeException("Division par zéro impossible.");
        }
        return $dividende / $diviseur;
    }

    public function hello(string $name): string
    {
        return "Hello $name";
    }

    public function estPair(int $nombre): bool {
        return $nombre % 2 === 0;
    }

    public function concatener(string $chaine1, string $chaine2): string {
        return $chaine1 . $chaine2;
    }

    public function extraireElementsPairs(array $tableau): array {
        $elementsPairs = [];

        foreach ($tableau as $element) {
            if ($element % 2 === 0) {
                $elementsPairs[] = $element;
            }
        }

        return $elementsPairs;
    }
}
