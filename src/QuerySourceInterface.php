<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides the query source.
 */
interface QuerySourceInterface {

  /**
   * Execute the query against the source.
   *
   * @param \Xylemical\Query\QueryInterface $query
   *   The query.
   *
   * @return \Generator
   *   The source generator.
   */
  public function execute(QueryInterface $query): \Generator;

}
