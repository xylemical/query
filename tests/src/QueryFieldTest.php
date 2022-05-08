<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Storage\Query\QueryField.
 */
class QueryFieldTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $group = new QueryField('foo.bar', 'SUM');
    $this->assertEquals('foo.bar', $group->getField());
    $this->assertEquals('SUM', $group->getGrouping());
  }

}
