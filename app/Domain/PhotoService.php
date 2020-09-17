<?php


namespace App\Domain;

class PhotoService
{
    public function fetchAllBySpan(
        ?int $year = null,
        ?int $month = null,
        ?int $day = null
    ) : Payload
    {
        $select = $this->atlas
            ->select(Photos::class)
            ->orderBy('year DESC', 'month DESC', 'day DESC');

        if ($year !== null) {
            $select->where('year = ', $year);
        }

        if ($month !== null) {
            $select->where('month = ', $month);
        }

        if ($day !== null) {
            $select->where('day = ', $day);
        }

        $result = $select->fetchRecordSet();
        if ($result->isEmpty()) {
            return Payload::notFound();
        }

        return Payload::found($result);
    }
}