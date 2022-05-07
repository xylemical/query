<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a query range.
 */
interface QueryRangeInterface {

  /**
   * Get the offset.
   *
   * @return int
   *   The offset.
   */
  public function getOffset(): int;

  /**
   * Get the count.
   *
   * @return int|null
   *   The count or NULL.
   */
  public function getCount(): ?int;

}
