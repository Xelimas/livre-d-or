<?php
class Interval {

    private int $begin;
    private int $end;

    public function __construct(int $begin, int $end) {
        $this->begin = $begin;
        $this->end = $end;
    }

    // Méthodes
    public function isBetween(int $hour): bool {
        return $hour >= $this->begin && $hour <= $this->end;
    }

    public function intersect(Interval $interval): bool {
        return $this->isBetween($interval->begin) || $this->isBetween($interval->end);
        // Si un interval englobe l'autre
    }

}