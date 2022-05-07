<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query range.
 */
class QueryRange implements QueryRangeInterface {

  /**
   * The offset.
   *
   * @var int
   */
  protected int $offset;

  /**
   * The count.
   *
   * @var int|null
   */
  protected ?int $count;

  /**
   * QueryRange constructor.
   *
   * @param int $offset
   *   The offset.
   * @param int|null $count
   *   The count.
   */
  public function __construct(int $offset, ?int $count = NULL) {
    $this->offset = $offset;
    $this->count = $count;
  }

  /**
   * {@inheritdoc}
   */
  public function getOffset(): int {
    return $this->offset;
  }

  /**
   * {@inheritdoc}
   */
  public function getCount(): ?int {
    return $this->count;
  }

}
