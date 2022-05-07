<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query condition factory.
 */
class QueryConditionFactory implements QueryConditionFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(string $field, string $operation, mixed $value): QueryConditionInterface {
    return new QueryCondition($field, $operation, $value);
  }

}
