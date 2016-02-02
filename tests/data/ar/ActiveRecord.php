<?php

namespace vistart\mongodb\tests\data\ar;

/**
 * Test Mongo ActiveRecord
 */
class ActiveRecord extends \vistart\mongodb\ActiveRecord
{
    public static $db;

    public static function getDb()
    {
        return self::$db;
    }
}
