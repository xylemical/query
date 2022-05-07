<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides the factory for group queries.
 */
interface QueryGroupFactoryInterface {

  /**
   * Create a query group condition.
   *
   * @param string $field
   *   The field.
   * @param string $operation
   *   The group operation.
   *
   * @return \Xylemical\Query\QueryGroupInterface
   *   The query group definition.
   */
  public function create(string $field, string $operation): QueryGroupInterface;

}
