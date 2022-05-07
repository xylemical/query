<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\Range.
 */
class QueryRangeTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $range = new QueryRange(5);
    $this->assertEquals(5, $range->getOffset());
    $this->assertNull($range->getCount());

    $range = new QueryRange(5, 10);
    $this->assertEquals(5, $range->getOffset());
    $this->assertEquals(10, $range->getCount());
  }

}
