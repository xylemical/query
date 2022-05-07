<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query sort factory.
 */
class QuerySortFactory implements QuerySortFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(string $field, string $operation): QuerySortInterface {
    return new QuerySort($field, $operation);
  }

}
