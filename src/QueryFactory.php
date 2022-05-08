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
   * The query field factory.
   *
   * @var \Xylemical\Query\QueryFieldFactoryInterface
   */
  protected QueryFieldFactoryInterface $fieldFactory;

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
   * @param \Xylemical\Query\QueryFieldFactoryInterface $fieldFactory
   *   The field factory.
   * @param \Xylemical\Query\QueryRangeFactoryInterface $rangeFactory
   *   The range factory.
   */
  public function __construct(QueryConditionFactoryInterface $conditionFactory, QuerySortFactoryInterface $sortFactory, QueryFieldFactoryInterface $fieldFactory, QueryRangeFactoryInterface $rangeFactory) {
    $this->conditionFactory = $conditionFactory;
    $this->sortFactory = $sortFactory;
    $this->fieldFactory = $fieldFactory;
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
  public function getFieldFactory(): QueryFieldFactoryInterface {
    return $this->fieldFactory;
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
    return new Query($source, $target, $this->conditionFactory, $this->sortFactory, $this->fieldFactory, $this->rangeFactory);
  }

}
