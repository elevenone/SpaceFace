<?php

declare(strict_types=1);

/**
 * Schemaless database on top of SqLite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */



/**
 * Util class
 */
abstract class Util
{
    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var int
     */
    protected $processId;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $result;

    // based on https://gist.github.com/h4cc/9b716dc05869296c1be6
    public static function createMongoId()
    {
        $timestamp = \microtime(true);
        $processId = \random_int(10000, 99999);
        $id = \random_int(10, 1000);
        $result = '';

        // Building binary data.
        $bin = \sprintf(
            '%s%s%s%s',
            \pack('N', $timestamp),
            \substr(md5(uniqid()), 0, 3),
            \pack('n', $processId),
            \substr(\pack('N', $id), 1, 3)
        );

        // Convert binary to hex.
        for ($i = 0; $i < 12; $i++) {
            $result .= \sprintf('%02x', ord($bin[$i]));
        }

        return $result;
    }

}
