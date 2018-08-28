<?php
/**
 * Created by PhpStorm.
 * User: Lukas Lepez
 * Date: 21/08/2018
 * Time: 23:15
 */

use PHPUnit\Framework\TestCase;
include '../bddHuman.php';

class BddHumanTest extends TestCase
{
    public function testEmpty()
    {
        $bdd = new BddHuman();
        $this->assertEmpty($bdd);

        return $bdd;
    }
}