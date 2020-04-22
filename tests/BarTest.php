<?php

namespace Foo;

use PHPUnit\Framework\TestCase;
use Foo\Bar;

class BarTest extends TestCase
{

    public function testCanBeNegated()
    {
        // Arrange
        $a = new Bar(1);

        // Act
        $b = $a->negate();

        // Assert
        $this->assertEquals(-1, $b->getNumber());
    }

    public function testFalse()
    {
        $this->assertEquals(1, 1);
    }
}
