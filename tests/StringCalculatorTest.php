<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    function it_calculate_empty_string_as_zero()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(0, $calculator->add(""));
    }

    /**
     * @test
     */
    function it_calculate_sum_for_a_single_number()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(5, $calculator->add("5"));
    }

    /**
     * @test
     */
    function it_calculate_sum_for_multiple_numbers()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(6, $calculator->add("1,2,3"));
    }

    /**
     * @test
     */
    function it_calculate_with_pipe_and_a_comma_as_a_delimiter()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(6, $calculator->add("1|2,3"));
    }

    /**
     * @test
     */
    function it_calculate_with_custom_delimiters()
    {
        $calculator = new StringCalculator();
        $this->assertEquals(3, $calculator->add("//;\n1;2"));
    }

    /**
     * @test
     */
    function it_does_not_allow_negative_number()
    {
        $calculator = new StringCalculator();
        $this->expectException(\Exception::class);
        $calculator->add("1,-2");
    }
}
