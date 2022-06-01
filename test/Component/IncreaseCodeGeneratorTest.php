<?php

namespace HyperfTest\Component;

use App\Component\IncreaseCodeGenerator;
use PHPUnit\Framework\TestCase;

class IncreaseCodeGeneratorTest extends TestCase
{

    public function testGenerate()
    {
        $generator = make(IncreaseCodeGenerator::class);
        $code = $generator->generate('PR');
        $this->assertIsString($code);
        info($code);
    }
    public function testGenerateYear()
    {
        $generator = make(IncreaseCodeGenerator::class);
        $code = $generator->setDataLength(10)->generate('PR', '', $generator::LIFE_CYCLE_YEAR);
        $this->assertIsString($code);
        info($code);
    }
    public function testGenerateMonth()
    {
        $generator = make(IncreaseCodeGenerator::class);
        $code = $generator->setDataLength(8)->generate('PR', '', $generator::LIFE_CYCLE_MONTH);
        $this->assertIsString($code);
        info($code);
    }

    public function testRelative()
    {
        info(date('Y-m-d H:i:s', strtotime('last day of this month 23:59:59')));
        info(date('Y-m-d H:i:s', strtotime('tomorrow')));
        info(date('Y-m-d H:i:s', strtotime('this hour')));
    }
}
