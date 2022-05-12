<?php
namespace App;

class StringCalculator
{
    /**
     * @var string
     */
    protected $delimiter = ",|\|";

    /**
     * @param string $numberString
     * @return int
     * @throws \Exception
     */
    public function add(string $numberString): int
    {
        $numbers = $this->processString($numberString);

        $this->checkingForNegativeNumbers($numbers);

        return array_sum($numbers);
    }

    /**
     * @param string $numberString
     * @return array|false|string[]
     */
    protected function processString(string $numberString)
    {
        $customerDelimiter = "\/\/(.)\n";

        if (preg_match("/$customerDelimiter/", $numberString, $searchDelimiter)) {
            $this->delimiter = $searchDelimiter[1];
            $numberString = str_replace($searchDelimiter[0], '', $numberString);
        }

        return preg_split("/$this->delimiter/",$numberString);
    }

    /**
     * @param $numbers
     * @throws \Exception
     */
    protected function checkingForNegativeNumbers(array $numbers)
    {
        $negativeNumbers = [];
        foreach ($numbers as $number) {
            if($number < 0) {
                $negativeNumbers[]= $number;
            }
        }
        if ($negativeNumbers) {
            throw new \Exception(implode(',', $negativeNumbers) . '  negatives not allowed');
        }
    }
}