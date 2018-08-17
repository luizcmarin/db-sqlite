<?php
/**
 * @link http://www.yiiframework.com/
 *
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace Yiisoft\Db\Sqlite\Tests;

use Yiisoft\Db\Schema;
use Yiisoft\Db\Sqlite\ColumnSchemaBuilder;

/**
 * ColumnSchemaBuilderTest tests ColumnSchemaBuilder for SQLite.
 *
 * @group db
 * @group sqlite
 */
class ColumnSchemaBuilderTest extends \Yiisoft\Db\Tests\ColumnSchemaBuilderTest
{
    public $driverName = 'sqlite';

    /**
     * @param string $type
     * @param int    $length
     *
     * @return ColumnSchemaBuilder
     */
    public function getColumnSchemaBuilder($type, $length = null)
    {
        return new ColumnSchemaBuilder($type, $length, $this->getConnection());
    }

    /**
     * @return array
     */
    public function typesProvider()
    {
        return [
            ['integer UNSIGNED', Schema::TYPE_INTEGER, null, [
                ['unsigned'],
            ]],
            ['integer(10) UNSIGNED', Schema::TYPE_INTEGER, 10, [
                ['unsigned'],
            ]],
            // comments are ignored
            ['integer(10)', Schema::TYPE_INTEGER, 10, [
                ['comment', 'test'],
            ]],
        ];
    }
}
