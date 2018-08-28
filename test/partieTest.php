<?php
/**
 * Created by PhpStorm.
 * User: Lukas Lepez
 * Date: 22/08/2018
 * Time: 07:48
 */

use PHPUnit\Framework\TestCase;
include '../partie.php';

class PartieTest extends TestCase
{
    public function testEmpty()
    {
        $partie = new Partie();
        $this->assertEmpty($partie);

        return $partie;
    }
}