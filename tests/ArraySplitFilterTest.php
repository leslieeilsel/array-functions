<?php

namespace Spatie\Test;

use PHPUnit\Framework\TestCase;
use function spatie\array_split_filter;

class ArraySplitFilterTest extends TestCase
{
    /**
     * @test
     */
    public function it_will_put_all_that_pass_the_test_in_the_first_element_and_all_that_not_pass_in_the_second()
    {
        $numbers = range(1, 6);

        $evenTest = function ($number) {
            return $number % 2 == 0;
        };
        $oddTest = function ($number) {
            return $number % 2 != 0;
        };

        $this->assertSame(array_filter($numbers, $evenTest), array_split_filter($numbers, $evenTest)[0]);
        $this->assertSame(array_filter($numbers, $oddTest), array_split_filter($numbers, $evenTest)[1]);
    }

    /**
     * @test
     */
    public function it_can_handle_an_empty_array()
    {
        $this->assertTrue(is_array(array_split_filter([], function () {
        })));
        $this->assertCount(2, array_split_filter([], function () {
        }));
    }
}
