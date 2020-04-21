<?php

namespace Foo;

/**
 * Class Bar is a dead simple example for our PHP Unit Test.
 * @package Foo
 */
class Bar
{
    /** @var float */
    private $number;

    /**
     * Money constructor.
     * @param float $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * Get the number.
     * @return float
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get a Money object with the number negated.
     * @return Bar
     */
    public function negate()
    {
        return new Bar(-1 * $this->number);
    }

    /**
     * Example for PMD ExcessiveParameterList.
     * @param $p0
     * @param $p1
     * @param $p2
     * @param $p3
     * @param $p4
     * @param $p5
     * @param $p6
     * @param $p7
     * @param $p8
     * @param $p9
     * @param $p10
     */
    public function addData($p0, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10)
    {
    }
}
