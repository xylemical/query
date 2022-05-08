<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Query\QueryFactory.
 */
class QueryFactoryTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $conditionFactory = $this->getMockBuilder(QueryConditionFactoryInterface::class)->getMock();
    $sortFactory = $this->getMockBuilder(QuerySortFactoryInterface::class)->getMock();
    $groupFactory = $this->getMockBuilder(QueryFieldFactoryInterface::class)->getMock();
    $rangeFactory = $this->getMockBuilder(QueryRangeFactoryInterface::class)->getMock();
    $source = $this->getMockBuilder(QuerySourceInterface::class)->getMock();

    $factory = new QueryFactory($conditionFactory, $sortFactory, $groupFactory, $rangeFactory);
    $query = $factory->create($source, 'test');
    $this->assertSame($conditionFactory, $factory->getConditionFactory());
    $this->assertSame($sortFactory, $factory->getSortFactory());
    $this->assertSame($groupFactory, $factory->getFieldFactory());
    $this->assertSame($rangeFactory, $factory->getRangeFactory());
    $this->assertSame($source, $query->getSource());
    $this->assertSame($conditionFactory, $query->getConditionFactory());
    $this->assertSame($sortFactory, $query->getSortFactory());
    $this->assertSame($groupFactory, $query->getFieldFactory());
    $this->assertSame($rangeFactory, $query->getRangeFactory());
  }

}
