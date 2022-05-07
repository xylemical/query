<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query factory.
 */
class QueryFactory implements QueryFactoryInterface {

  /**
   * The query condition factory.
   *
   * @var \Xylemical\Query\QueryConditionFactoryInterface
   */
  protected QueryConditionFactoryInterface $conditionFactory;

  /**
   * The query sort factory.
   *
   * @var \Xylemical\Query\QuerySortFactoryInterface
   */
  protected QuerySortFactoryInterface $sortFactory;

  /**
   * The query group factory.
   *
   * @var \Xylemical\Query\QueryGroupFactoryInterface
   */
  protected QueryGroupFactoryInterface $groupFactory;

  /**
   * The query range factory.
   *
   * @var \Xylemical\Query\QueryRangeFactoryInterface
   */
  protected QueryRangeFactoryInterface $rangeFactory;

  /**
   * QueryFactory constructor.
   *
   * @param \Xylemical\Query\QueryConditionFactoryInterface $conditionFactory
   *   The condition factory.
   * @param \Xylemical\Query\QuerySortFactoryInterface $sortFactory
   *   The sort factory.
   * @param \Xylemical\Query\QueryGroupFactoryInterface $groupFactory
   *   The group factory.
   * @param \Xylemical\Query\QueryRangeFactoryInterface $rangeFactory
   *   The range factory.
   */
  public function __construct(QueryConditionFactoryInterface $conditionFactory, QuerySortFactoryInterface $sortFactory, QueryGroupFactoryInterface $groupFactory, QueryRangeFactoryInterface $rangeFactory) {
    $this->conditionFactory = $conditionFactory;
    $this->sortFactory = $sortFactory;
    $this->groupFactory = $groupFactory;
    $this->rangeFactory = $rangeFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getConditionFactory(): QueryConditionFactoryInterface {
    return $this->conditionFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getSortFactory(): QuerySortFactoryInterface {
    return $this->sortFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getGroupFactory(): QueryGroupFactoryInterface {
    return $this->groupFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getRangeFactory(): QueryRangeFactoryInterface {
    return $this->rangeFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function create(QuerySourceInterface $source, mixed $target): QueryInterface {
    return new Query($source, $target, $this->conditionFactory, $this->sortFactory, $this->groupFactory, $this->rangeFactory);
  }

}
