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
 * Exception represents an exception that is caused by some Mongo-related operations.
 *
 * @author vistart <i@vistart.name>
 * @since 2.0
 */
class Exception extends \yii\base\Exception
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'MongoDB Exception';
    }
}
