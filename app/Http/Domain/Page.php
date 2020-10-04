<?php
/**
 * root action
 */
namespace App\Http\Domain;


class Page
{
    protected $domain;
    protected $responder;

    public function __construct()
    {
    }

    public function fetchById($project_id)
    {
        // pdo query
        // child class method
        $data = [
            'items' => [ 
                ['project' => 'project id : ' . $project_id . ' data from Project domain from fetchById method whitch is called from Project action 077342856653465']
            ]];

        $payload = $this->newPayload(Payload::STATUS_FOUND, $data);

        return $payload;
    }

    public function fetchAll()
    {
        // pdo query
        // child class method
        $data = [
            'items' => [ 
                ['project' => 'project id : 001 data from Project domain from fetchById method whitch is called from Project action 077342856653465'],
                ['project' => 'project id : 002 data from Project domain from fetchById method whitch is called from Project action 077342856653465'],
                ['project' => 'project id : 003 data from Project domain from fetchById method whitch is called from Project action 077342856653465']
        ]
                

    ];

        $payload =  $this->newPayload(Payload::STATUS_FOUND, $data);

        return $payload;
    }







    // should go to parent class
    public function __call(string $method, array $params)
    {
        try {
            return $this->$method(...$params);
        } catch (Exception $e) {
            return $this->newPayload(Payload::STATUS_ERROR, [
                'method' => $method,
                'params' => $params,
                'exception' => $e,
            ]);
        }
    }

    protected function newPayload(string $status, array $result = []) : Payload
    {
        return new Payload($status, $result);
    }

}


