<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query field factory.
 */
class QueryFieldFactory implements QueryFieldFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(string $field, string $grouping = ''): QueryFieldInterface {
    return new QueryField($field, $grouping);
  }

}
