<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides the factory for fields.
 */
interface QueryFieldFactoryInterface {

  /**
   * Create a query field condition.
   *
   * @param string $field
   *   The field.
   * @param string $grouping
   *   The group operation.
   *
   * @return \Xylemical\Query\QueryFieldInterface
   *   The query field definition.
   */
  public function create(string $field, string $grouping = ''): QueryFieldInterface;

}
