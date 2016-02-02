<?php

namespace vistart\mongodb\tests\validators;

use yii\base\Model;
use vistart\mongodb\validators\MongoIdValidator;
use vistart\mongodb\tests\TestCase;

class MongoIdValidatorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockApplication();
    }

    public function testValidateValue()
    {
        $validator = new MongoIdValidator();
        $this->assertFalse($validator->validate('id'));
        $this->assertTrue($validator->validate(new \MongoId('4d3ed089fb60ab534684b7e9')));
        $this->assertTrue($validator->validate('4d3ed089fb60ab534684b7e9'));
    }

    public function testValidateAttribute()
    {
        $model = new MongoIdTestModel();
        $validator = new MongoIdValidator();
        $validator->attributes = ['id'];
        $model->getValidators()->append($validator);

        $model->id = 'id';
        $this->assertFalse($model->validate());
        $model->id = new \MongoId('4d3ed089fb60ab534684b7e9');
        $this->assertTrue($model->validate());
        $model->id = '4d3ed089fb60ab534684b7e9';
        $this->assertTrue($model->validate());
    }

    /**
     * @depends testValidateAttribute
     */
    public function testConvertValue()
    {
        $model = new MongoIdTestModel();
        $validator = new MongoIdValidator();
        $validator->attributes = ['id'];
        $model->getValidators()->append($validator);

        $validator->forceFormat = null;
        $model->id = '4d3ed089fb60ab534684b7e9';
        $model->validate();
        $this->assertTrue(is_string($model->id));
        $model->id = new \MongoId('4d3ed089fb60ab534684b7e9');
        $model->validate();
        $this->assertTrue($model->id instanceof \MongoId);

        $validator->forceFormat = 'object';
        $model->id = '4d3ed089fb60ab534684b7e9';
        $model->validate();
        $this->assertTrue($model->id instanceof \MongoId);

        $validator->forceFormat = 'string';
        $model->id = new \MongoId('4d3ed089fb60ab534684b7e9');
        $model->validate();
        $this->assertTrue(is_string($model->id));
    }
}

class MongoIdTestModel extends Model
{
    public $id;
}