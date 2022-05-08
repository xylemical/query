<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * A generic query field.
 */
class QueryField implements QueryFieldInterface {

  /**
   * The field.
   *
   * @var string
   */
  protected string $field;

  /**
   * The grouping.
   *
   * @var string
   */
  protected string $grouping;

  /**
   * {@inheritdoc}
   */
  public function __construct(string $field, string $grouping = '') {
    $this->field = $field;
    $this->grouping = strtoupper($grouping);
  }

  /**
   * {@inheritdoc}
   */
  public function getField(): string {
    return $this->field;
  }

  /**
   * {@inheritdoc}
   */
  public function getGrouping(): string {
    return $this->grouping;
  }

}
