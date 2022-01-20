<?php

namespace InterviewExercise\Common;

use Psr\Http\Message\ResponseInterface;

class StatusController
{
    public function status(ResponseInterface $response): ResponseInterface
    {
        $response->getBody()->write('{"status": "ok"}');

        return $response;
    }
}
