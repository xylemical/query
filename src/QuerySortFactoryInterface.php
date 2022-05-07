<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides the creation of query sort conditions.
 */
interface QuerySortFactoryInterface {

  /**
   * Create a query sort condition.
   *
   * @param string $field
   *   The field.
   * @param string $operation
   *   The sort operation.
   *
   * @return \Xylemical\Query\QuerySortInterface
   *   The query sort definition.
   */
  public function create(string $field, string $operation): QuerySortInterface;

}
