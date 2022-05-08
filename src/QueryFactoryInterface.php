<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides for creating queries.
 */
interface QueryFactoryInterface {

  /**
   * Get the query condition factory.
   *
   * @return \Xylemical\Query\QueryConditionFactoryInterface
   *   The factory.
   */
  public function getConditionFactory(): QueryConditionFactoryInterface;

  /**
   * Get the query sort factory.
   *
   * @return \Xylemical\Query\QuerySortFactoryInterface
   *   The factory.
   */
  public function getSortFactory(): QuerySortFactoryInterface;

  /**
   * Get the query field factory.
   *
   * @return \Xylemical\Query\QueryFieldFactoryInterface
   *   The factory.
   */
  public function getFieldFactory(): QueryFieldFactoryInterface;

  /**
   * Get the query range factory.
   *
   * @return \Xylemical\Query\QueryRangeFactoryInterface
   *   The factory.
   */
  public function getRangeFactory(): QueryRangeFactoryInterface;

  /**
   * Create a query for a target.
   *
   * @param \Xylemical\Query\QuerySourceInterface $source
   *   The query source.
   * @param mixed $target
   *   The target.
   *
   * @return \Xylemical\Query\QueryInterface
   *   The query.
   */
  public function create(QuerySourceInterface $source, mixed $target): QueryInterface;

}
