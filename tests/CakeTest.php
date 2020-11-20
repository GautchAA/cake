<?php
use PHPUnit\Framework\TestCase;
require_once ('Cake.php');

class CakeTest extends TestCase {
    public function testRevertCharacters()
    {
        $cake = new Cake();
        $this->assertEquals("Тевирп! Онвад ен ьсиледив.", $cake->revertCharacters("Привет! Давно не виделись."));
   }
}
