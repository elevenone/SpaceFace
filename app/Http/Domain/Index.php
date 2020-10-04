<?php
/**
 * root action
 */
namespace App\Http\Domain;

use App\Http\Domain\ApplicationService;

class Index extends ApplicationService
{
    protected $domain;
    protected $responder;

    public function __construct()
    {
    }

    public function fetchAll()
    {
        $payload =  $this->newPayload(Payload::STATUS_FOUND, [
            'zorro' => 'data from index domain from fetchall method whitch is called from get action 077342856653465',
        ]);

        return $payload;
        print_r($payload->result{'zorro'});

    }

    public function __invoke()
    {
        echo __METHOD__ . PHP_EOL;
        echo __FUNCTION__ . PHP_EOL;
    }

    public function __destruct()
    {
        echo '</blockquote><hr/>';
    }

}


