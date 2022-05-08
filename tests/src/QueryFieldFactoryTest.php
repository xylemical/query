<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QueryFieldFactory.
 */
class QueryFieldFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $factory = new QueryFieldFactory();
    $group = $factory->create('foo.bar', 'sum');
    $this->assertEquals('foo.bar', $group->getField());
    $this->assertEquals('SUM', $group->getGrouping());
  }

}
