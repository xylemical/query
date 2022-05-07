<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a range factory.
 */
interface QueryRangeFactoryInterface {

  /**
   * Create a range.
   *
   * @param int $offset
   *   The offset.
   * @param int|null $count
   *   The count or NULL.
   *
   * @return \Xylemical\Query\QueryRangeInterface
   *   The range.
   */
  public function create(int $offset, ?int $count): QueryRangeInterface;

}
