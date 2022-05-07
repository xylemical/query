<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query range.
 */
class QueryRangeFactory implements QueryRangeFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function create(int $offset, ?int $count): QueryRangeInterface {
    return new QueryRange($offset, $count);
  }

}
