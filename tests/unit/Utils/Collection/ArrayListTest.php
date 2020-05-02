<?php
/**
 * 2020-2020 Majframe
 *
 *  NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License (GPL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @copyright 2020-2020 Majframe
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License (GPL 3.0)
 */

namespace Majframe\Utils\Collection;


use Codeception\Test\Unit;

class ArrayListTest extends Unit
{
    protected const
        VALUE = 5,
        INDEX = 1;

    public function testAddAndGet(): void
    {
        $array = new ArrayList;
        $array->add(self::VALUE);
        $this->assertEquals(self::VALUE, $array->get(0));
    }

    public function testPrepend(): void
    {
        $array = new ArrayList;
        $array->add('random');
        $array->add(self::VALUE, ArrayList::PREPEND);
        $this->assertEquals(self::VALUE, $array->get(0));
    }

    public function testSet(): void
    {
        $array = new ArrayList;
        $array->set(self::INDEX, self::VALUE);
        $this->assertEquals(self::VALUE, $array->get(self::INDEX));
    }

    public function testCount(): void
    {
        $array = new ArrayList;
        $total = 10;
        for ($i = 0; $i < $total; $i++) {
            $array->add(self::VALUE);
        }
        $this->assertEquals($total, $array->count());
    }

    public function testRemove(): void
    {
        $array = new ArrayList;
        $array->add(self::VALUE);
        $array->remove(0);
        $this->assertEquals(0, $array->count());
    }

    public function testAsArray(): void
    {
        $array = new ArrayList;
        $array->add(self::VALUE);
        $array->add(self::VALUE);
        $this->assertEquals([self::VALUE, self::VALUE], $array->asArray());
    }

    public function testExists(): void
    {
        $array = new ArrayList;
        $array->add(self::VALUE);
        $this->assertTrue($array->exists(0));
    }

    public function testIn(): void
    {
        $array = new ArrayList;
        $array->add(self::VALUE);
        $this->assertTrue($array->in(self::VALUE));
    }
}
