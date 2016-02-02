<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace vistart\mongodb;

/**
 * @author vistart <i@vistart.name>
 */
class MongoHelper
{

    /**
     * Converts all instances of stdClass to array recursively
     * @param \stdClass $row
     * @return array
     */
    public static function resultToArray($row)
    {
        //TODO: Change this by using \MongoDB\Driver\Cursor::setTypeMap
        if ($row instanceof \stdClass) {
            $row = (array) $row;
        }

        if (is_array($row)) {
            foreach ($row as $key => $value) {
                $row[$key] = self::resultToArray($value);
            }
        }

        return $row;
    }

    /**
     * @param \MongoDB\Driver\Cursor $cursor
     * @return array first value of cursor.
     */
    public static function cursorFirst($cursor)
    {
        foreach ($cursor as $row) {
            return self::resultToArray($row);
        }
        return null;
    }
}
