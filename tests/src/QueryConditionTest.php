<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Storage\Query\QueryCondition.
 */
class QueryConditionTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $condition = new QueryCondition('foo.bar', '<', 10);
    $this->assertEquals('foo.bar', $condition->getField());
    $this->assertEquals('<', $condition->getOperation());
    $this->assertEquals(10, $condition->getValue());
  }

}
