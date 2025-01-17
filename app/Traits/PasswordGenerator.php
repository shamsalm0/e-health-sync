<?php

namespace App\Traits;

trait PasswordGenerator
{
    public function generatePassword($digit = 10): string
    {
        $number = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $lowercase = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z'];
        $uppercase = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'Z'];
        $symbol = ['#', '@', '%', '&', '*', '!'];
        $character = [...$number, ...$lowercase, ...$uppercase, ...$symbol];

        shuffle($number);
        shuffle($lowercase);
        shuffle($uppercase);
        shuffle($symbol);
        shuffle($character);

        $last_index_number = count($number) - 1;
        $last_index_lowercase = count($lowercase) - 1;
        $last_index_uppercase = count($uppercase) - 1;
        $last_index_symbol = count($symbol) - 1;
        $last_index_character = count($character) - 1;

        $password = '';

        //tow number
        foreach (range(1, 2) as $value) {
            $tmp = $number[rand(0, $last_index_number)];
            $password .= $tmp;
        }
        $this->strShuffle($password);
        //tow lowercase
        foreach (range(1, 2) as $value) {
            $tmp = $lowercase[rand(0, $last_index_lowercase)];
            $password .= $tmp;
        }
        $this->strShuffle($password);
        //tow uppercase
        foreach (range(1, 2) as $value) {
            $tmp = $uppercase[rand(0, $last_index_uppercase)];
            $password .= $tmp;
        }
        $this->strShuffle($password);
        //tow symbol
        foreach (range(1, 2) as $value) {
            $tmp = $symbol[rand(0, $last_index_symbol)];
            $password .= $tmp;
        }
        $this->strShuffle($password);
        $password_lengtn = strlen($password);

        if ($password_lengtn < $digit) {
            foreach (range(0, ($digit - $password_lengtn)) as $value) {
                $tmp = $character[rand(0, $last_index_character)];
                $password .= $tmp;
            }
        }
        $this->strShuffle($password);

        return $password;
    }

    private function strShuffle(&$password): void
    {
        $passwordArray = str_split($password);
        shuffle($passwordArray);
        $shuffledPassword = implode('', $passwordArray);
        $password = $shuffledPassword;
    }
}
