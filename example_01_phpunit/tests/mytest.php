<?php
class MyTest extends PHPUnit_Framework_TestCase
{
    public function testEmpty()
    {
        $this->assertEquals('3.7.7', PHPUnit_Runner_Version::id());
    }
}