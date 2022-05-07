<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Storage\Query\QueryGroup.
 */
class QueryGroupTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $group = new QueryGroup('foo.bar', 'SUM');
    $this->assertEquals('foo.bar', $group->getField());
    $this->assertEquals('SUM', $group->getOperation());
  }

}
