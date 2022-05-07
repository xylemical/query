<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QueryConditionFactory.
 */
class QueryConditionFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $factory = new QueryConditionFactory();
    $condition = $factory->create('foo.bar', 'add', 'test');
    $this->assertEquals('foo.bar', $condition->getField());
    $this->assertEquals('ADD', $condition->getOperation());
    $this->assertEquals('test', $condition->getValue());
  }

}
