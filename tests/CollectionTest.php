<?php

namespace Typomedia\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Typomedia\Collection\Collection;

class CollectionTest extends TestCase
{
    public function testSetItem()
    {
        $data = [
            'Moretti' => [
            'name' => 'Style Ale',
            'style' => 'European Amber Lager',
            'hop' => 'Saaz',
            'yeast' => '3333 - German Wheat',
            'malts' => 'Black malt',
            'ibu' => '91 IBU',
            'alcohol' => '9.1%',
            'blg' => '11.8°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($data);

        $this->assertIsArray($collection->items);
    }

    public function testSetItemSameKey()
    {
        $data = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($data, md5(serialize($data)));
        $collection->set($data, md5(serialize($data)));

        $this->assertEquals(1, $collection->count());
    }

    public function testGetItem()
    {
        $data = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($data);

        $actual = $collection->get(0);
        $this->assertEquals((object)$data, $actual);
    }

    public function testGetItemNonExistingKey()
    {
        $data = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($data);

        $actual = $collection->get(10);
        $this->assertEquals(null, $actual);
    }

    public function testFirstItem()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->first();
        $this->assertEquals($item1, $actual);
    }

    public function testFirstItemWrongOffset()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->first(100);
        $this->assertEquals($item2, $actual);
    }

    public function testLastItem()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->last();
        $this->assertEquals($item2, $actual);
    }

    public function testLastItemWrongOffset()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->last(100);
        $this->assertEquals($item1, $actual);
    }

    public function testCountItems()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->count();
        $this->assertEquals(2, $actual);
    }

    public function testDeleteItem()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);
        $collection->delete(1);

        $actual = $collection->count();
        $this->assertEquals(1, $actual);
    }

    public function testKeysItem()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->keys();
        $this->assertEquals([0, 1], $actual);
    }

    public function testFindItem()
    {
        $item1 = [
            'Moretti' => [
                'name' => 'Style Ale',
                'style' => 'European Amber Lager',
                'hop' => 'Saaz',
                'yeast' => '3333 - German Wheat',
                'malts' => 'Black malt',
                'ibu' => '91 IBU',
                'alcohol' => '9.1%',
                'blg' => '11.8°Blg',
            ]
        ];

        $item2 = [
            "Hennepin" => [
                'name' => 'Rolling Rock',
                'style' => 'English Brown Ale',
                'hop' => 'Mosaic',
                'yeast' => '1007 - German Ale',
                'malts' => 'Munich',
                'ibu' => '14 IBU',
                'alcohol' => '5.5%',
                'blg' => '5.4°Blg',
            ]
        ];

        $collection = new Collection();
        $collection->set($item1);
        $collection->set($item2);

        $actual = $collection->find('name', 'Rolling Rock');
        $this->assertEquals([1], $actual);
    }

}