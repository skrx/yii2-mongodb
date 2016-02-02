<?php

namespace vistart\mongodb\tests;

use vistart\mongodb\Collection;

/**
 * @group mongodb
 */
class DatabaseTest extends TestCase
{
    protected function tearDown()
    {
        $this->dropCollection('customer');
        parent::tearDown();
    }

    // Tests :

    public function testGetCollection()
    {
        $database = $connection = $this->getConnection()->getDatabase();

        $collection = $database->getCollection('customer');
        $this->assertTrue($collection instanceof Collection);
        $this->assertTrue($collection->mongoCollection instanceof \MongoCollection);

        $collection2 = $database->getCollection('customer');
        $this->assertTrue($collection === $collection2);

        $collectionRefreshed = $database->getCollection('customer', true);
        $this->assertFalse($collection === $collectionRefreshed);
    }

    public function testExecuteCommand()
    {
        $database = $connection = $this->getConnection()->getDatabase();

        $result = $database->executeCommand([
            'distinct' => 'customer',
            'key' => 'name'
        ]);
        $this->assertTrue(array_key_exists('ok', $result));
        $this->assertTrue(array_key_exists('values', $result));
    }

    public function testCreateCollection()
    {
        $database = $connection = $this->getConnection()->getDatabase();
        $collection = $database->createCollection('customer');
        $this->assertTrue($collection instanceof \MongoCollection);
    }
}
