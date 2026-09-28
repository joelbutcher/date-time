<?php

declare(strict_types=1);

namespace Brick\DateTime;

use JsonSerializable;
use Override;

/**
 * Represents a quarter-of-year.
 */
enum Quarter: int implements JsonSerializable
{
    /**
     * January 1 to March 31.
     */
    case Q1 = 1;

    /**
     * April 1 to June 30.
     */
    case Q2 = 2;

    /**
     * July 1 to September 30.
     */
    case Q3 = 3;

    /**
     * October 1 to December 31.
     */
    case Q4 = 4;

    /**
     * Returns the current quarter in the given time-zone, according to the given clock.
     *
     * If no time-zone is provided, the time-zone of the clock is used if it is a ZonedClock, or UTC otherwise.
     */
    public static function now(Clock $clock, ?TimeZone $timeZone = null): self
    {
        return LocalDate::now($clock, $timeZone)->getQuarter();
    }

    /**
     * Serializes as an integer.
     */
    #[Override]
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
