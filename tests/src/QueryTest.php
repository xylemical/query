<?php

declare(strict_types=1);

namespace Xylemical\Query;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Tests \Xylemical\Query\Query.
 */
class QueryTest extends TestCase {

  use ProphecyTrait;

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $conditionFactory = new QueryConditionFactory();
    $sortFactory = new QuerySortFactory();
    $groupFactory = new QueryGroupFactory();
    $rangeFactory = new QueryRangeFactory();

    $source = $this->prophesize(QuerySourceInterface::class);
    $source->execute(Argument::any())->willYield([]);
    $source = $source->reveal();

    $query = new Query($source, 'test', $conditionFactory, $sortFactory, $groupFactory, $rangeFactory);
    $this->assertEquals('test', $query->getTarget());
    $this->assertSame($source, $query->getSource());
    $this->assertSame($conditionFactory, $query->getConditionFactory());
    $this->assertSame($sortFactory, $query->getSortFactory());
    $this->assertSame($groupFactory, $query->getGroupFactory());
    $this->assertEquals([], $query->getConditions());
    $this->assertEquals([], $query->getGroups());
    $this->assertEquals([], $query->getSorts());
    $this->assertNull($query->getRange());

    $conditions = [new QueryCondition('foo.bar', 'add', 'test')];
    $query->setConditions($conditions);
    $this->assertEquals($conditions, $query->getConditions());
    $query->setConditions([])->condition('foo.bar', 'add', 'test');
    $this->assertEquals($conditions, $query->getConditions());

    $sorts = [new QuerySort('foo.bar', 'add')];
    $query->setSorts($sorts);
    $this->assertEquals($sorts, $query->getSorts());
    $query->setSorts([])->sort('foo.bar', 'add');
    $this->assertEquals($sorts, $query->getSorts());

    $groups = [new QueryGroup('foo.bar', 'add')];
    $query->setGroups($groups);
    $this->assertEquals($groups, $query->getGroups());
    $query->setGroups([])->group('foo.bar', 'add');
    $this->assertEquals($groups, $query->getGroups());

    $query->range(10, 0);
    $this->assertNotNull($query->getRange());
    $this->assertEquals(0, $query->getRange()->getCount());
    $this->assertEquals(10, $query->getRange()->getOffset());

    $query->range(10, 10);
    $this->assertEquals(10, $query->getRange()->getCount());
    $this->assertEquals(10, $query->getRange()->getOffset());
  }

  /**
   * Tests the execute function.
   */
  public function testExecute(): void {
    $conditionFactory = new QueryConditionFactory();
    $sortFactory = new QuerySortFactory();
    $groupFactory = new QueryGroupFactory();
    $rangeFactory = new QueryRangeFactory();

    $source = $this->prophesize(QuerySourceInterface::class);
    $source->execute(Argument::any())->willYield([]);

    $query = new Query($source->reveal(), 'test', $conditionFactory, $sortFactory, $groupFactory, $rangeFactory);
    $this->assertEquals([], iterator_to_array($query->execute()));

    $source = $this->prophesize(QuerySourceInterface::class);
    $source->execute(Argument::any())->will(function ($args) {
      yield $args[0];
    });

    $query = new Query($source->reveal(), 'test', $conditionFactory, $sortFactory, $groupFactory, $rangeFactory);
    $this->assertEquals([$query], iterator_to_array($query->execute()));
  }

}
