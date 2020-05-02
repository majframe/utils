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


use ArrayIterator;
use Countable;
use IteratorAggregate;
use Majframe\Utils\Exception\InvalidArgumentException;

/**
 * Class AbstractCollection
 * @package Majframe\Routing\Collection
 */
class ArrayList implements Collectible, Countable, IteratorAggregate
{
    public const
        APPEND = true,
        PREPEND = false;

    /**
     * @var array $values
     */
    protected array $values;

    /**
     * @param mixed $value
     * @param bool $append
     */
    public function add($value, bool $append = self::APPEND): void
    {
        if ($append === self::APPEND) {
            $this->values[] = $value;
            return;
        }
        $old = $this->values;
        $this->values[0] = $value;
        array_splice($this->values, 1, 0, $old);
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function get($index)
    {
        return $this->values[$index];
    }

    /**
     * @param int $index
     * @param mixed $value
     */
    public function set($index, $value): void
    {
        $this->values[$index] = $value;
    }

    /**
     * @param int $index
     */
    public function remove($index): void
    {
        unset($this->values[$index]);
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function exists($index): bool
    {
        return array_key_exists($index, $this->values);
    }

    /**
     * @param mixed $value
     * @param bool $strict
     * @return mixed
     */
    public function in($value, $strict = true): bool
    {
        return in_array($value, $this->values, $strict);
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return $this->values;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->values);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->values);
    }

    /**
     * @param $class
     * @param $value
     */
    protected function validate($class, $value): void
    {
        if (!$value instanceof $class) {
            throw new InvalidArgumentException($class, (is_object($value) ? get_class($value) : gettype($value)));
        }
    }
}