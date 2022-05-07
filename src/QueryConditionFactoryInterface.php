<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides the creation of query conditions.
 */
interface QueryConditionFactoryInterface {

  /**
   * Creates a query condition.
   *
   * @param string $field
   *   The field.
   * @param string $operation
   *   The operation.
   * @param mixed|\Xylemical\Query\QueryConditionInterface $value
   *   The value.
   *
   * @return \Xylemical\Query\QueryConditionInterface
   *   The condition.
   */
  public function create(string $field, string $operation, mixed $value): QueryConditionInterface;

}
