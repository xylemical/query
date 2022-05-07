<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\Sort.
 */
class QuerySortTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $sort = new QuerySort('foo.bar', 'asc');
    $this->assertEquals('foo.bar', $sort->getField());
    $this->assertEquals('ASC', $sort->getOperation());
  }

}
