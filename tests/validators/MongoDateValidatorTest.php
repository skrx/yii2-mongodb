<?php

namespace vistart\mongodb\tests\validators;

use yii\base\Model;
use vistart\mongodb\validators\MongoDateValidator;
use vistart\mongodb\tests\TestCase;

class MongoDateValidatorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockApplication();
    }

    public function testValidateValue()
    {
        $validator = new MongoDateValidator();
        $this->assertFalse($validator->validate('string'));
        $this->assertTrue($validator->validate(new \MongoDate(time())));
    }

    public function testValidateAttribute()
    {
        $model = new MongoDateTestModel();

        $model->date = 'string';
        $this->assertFalse($model->validate());
        $model->date = new \MongoDate(time());
        $this->assertTrue($model->validate());
    }

    public function testMongoDateAttribute()
    {
        $model = new MongoDateTestModel();

        $model->date = '05/08/2015';
        $this->assertTrue($model->validate());
        $this->assertTrue($model->mongoDate instanceof \MongoDate);
        $this->assertEquals(strtotime('2015-05-08'), $model->mongoDate->sec);
    }
}

class MongoDateTestModel extends Model
{
    public $date;
    public $mongoDate;

    public function rules()
    {
        return [
            ['date', MongoDateValidator::className(), 'format' => 'MM/dd/yyyy', 'mongoDateAttribute' => 'mongoDate']
        ];
    }
}