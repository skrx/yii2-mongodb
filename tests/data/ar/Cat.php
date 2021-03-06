<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace vistart\mongodb\tests\data\ar;

/**
 * Class Cat
 *
 * @author vistart <i@vistart.name>
 * @since 2.0
 */
class Cat extends Animal
{

    /**
     * 
     * @param self $record
     * @param array $row
     */
    public static function populateRecord($record, $row)
    {
        parent::populateRecord($record, $row);

        $record->does = 'meow';
    }

}
