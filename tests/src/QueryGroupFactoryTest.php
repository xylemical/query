<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QueryGroupFactory.
 */
class QueryGroupFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $factory = new QueryGroupFactory();
    $group = $factory->create('foo.bar', 'sum');
    $this->assertEquals('foo.bar', $group->getField());
    $this->assertEquals('SUM', $group->getOperation());
  }

}
