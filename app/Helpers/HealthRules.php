<?php

namespace App\Helpers;

class HealthRules
{
    private $name;
    private $age;
    private $sex;
    private $hours;
    private $eating;
    private $kilometers;


    function __construct(string $name, string $birthdate, string $sex, int $height, float $weight)
    {
        $this->name = $name;
        $this->age = $this->calculateAge($birthdate);
        $this->sex = $this->calculateSex($sex);
        $this->hours = $this->calculateHours($height);
        $this->eating = $this->calculateEating($weight);
        $this->kilometers = $this->calculateKilometers($birthdate);
    }

    public function getRecommendation()
    {
        $recommendation = "";

        if ($this->age < 18) {
            $recommendation = "Hola " . $this->name . " eres " . $this->sex . " joven muy saludable, te recomiendo salir a jugar al aire libre durante " . $this->hours . " horas diarias";
        } else {
            $recommendation = "Hola " . $this->name . " eres una persona muy saludable, te recomiendo comer " . $this->eating . " y salir a correr " . $this->kilometers . " km diarios";
        }

        return $recommendation;
    }

    private function calculateHours($height)
    {
        // Fibonacci:
        $fibo = 0;
        $v2 = 1;

        for ($i = 0; $i < 1000000; $i++) {
            $temp = $fibo;
            $fibo = $v2;
            $v2 = $temp + $fibo;

            if ($fibo > $height) {
                $hours = $temp;
                break;
            }
        }

        return $hours;
    }

    private function calculateKilometers($birthdate)
    {
        $data = explode('-', $birthdate);
        $year = $data[0];
        $number = (int) $year[2] . $year[3];
        $root = sqrt($number);
        return number_format($root, 2);
    }

    private function calculateAge($birthdate)
    {
        $bday = new \DateTime($birthdate); // Your date of birth
        $today = new \DateTime(date('m.d.y'));
        $diff = $today->diff($bday);

        return $diff->y;
    }

    private function calculateSex($sex)
    {
        switch (strtoupper($sex)) {
            case 'M':
                return 'un';
            case 'F':
                return 'una';
        }
    }

    private function calculateEating($weight)
    {
        if ($weight < 30) {
            return 'menos';
        }

        return 'más';
    }
}