<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\AbstractEntity;

class AbstractEntityTest extends TestCase
{
    function testNonInstanciable(): void
    {
        $this->expectException(Error::class);
        new AbstractEntity();
    }
}