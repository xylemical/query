<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query group factory.
 */
class QueryGroupFactory implements QueryGroupFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(string $field, string $operation): QueryGroupInterface {
    return new QueryGroup($field, $operation);
  }

}
