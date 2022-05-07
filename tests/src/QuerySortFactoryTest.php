<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QuerySortFactory.
 */
class QuerySortFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $factory = new QuerySortFactory();
    $sort = $factory->create('foo.bar', 'asc');
    $this->assertEquals('foo.bar', $sort->getField());
    $this->assertEquals('ASC', $sort->getOperation());
  }

}
