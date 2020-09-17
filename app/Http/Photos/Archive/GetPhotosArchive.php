<?php



namespace App\Http\Photos\Archive;

class GetPhotosArchive
{
    public function __invoke(
        int $year = null,
        int $month = null,
        int $day = null
    ) : \ServerResponse
    {
        $payload = $this->domain->fetchAllBySpan($year, $month, $day);
        return $this->responder->response($payload);
    }
}

