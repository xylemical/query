<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QueryRangeFactory.
 */
class QueryRangeFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $factory = new QueryRangeFactory();
    $range = $factory->create(10, 15);
    $this->assertEquals(10, $range->getOffset());
    $this->assertEquals(15, $range->getCount());

    $range = $factory->create(10, NULL);
    $this->assertEquals(10, $range->getOffset());
    $this->assertNull($range->getCount());
  }

}
