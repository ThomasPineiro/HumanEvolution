<?php
/**
 * Created by PhpStorm.
 * User: Lukas Lepez
 * Date: 21/08/2018
 * Time: 22:52
 */

use PHPUnit\Framework\TestCase;
include '../personnage.php';

class PersonnageTest extends TestCase
{
    public function testEmpty()
    {
        $personnage = new Personnage(1);
        $this->assertEmpty($personnage);

        return $personnage;
    }
}