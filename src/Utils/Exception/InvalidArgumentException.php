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

namespace Majframe\Utils\Exception;


/**
 * Class InvalidArgumentException
 * @package Majframe\Utils\Exception
 */
class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * InvalidArgumentException constructor.
     * @param string $expected
     * @param string $given
     */
    public function __construct(string $expected, string $given)
    {
        parent::__construct('Item must be instance of ' . $expected . '. ' .
            $given . ' given.');
    }

}