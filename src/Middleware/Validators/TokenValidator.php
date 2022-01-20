<?php

namespace InterviewExercise\Middleware\Validators;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

class TokenValidator
{
    /**
     * @var string Used for the authentication token
     */
    protected static string $validToken =
        'e73bb59be2dca745dd023700ebe12fc4664bb48eb21957ff6edc86bda6879913e7185bea5d9fd20eb7ef6fe8dcc5d899';

    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): Response
    {
        if (!$request->hasHeader('Authorization') 
            || $request->getHeader('Authorization')[0] !== 'Bearer ' . self::$validToken
        ) {
            return (new Response())->withStatus(403);
        }

        return $handler->handle($request);
    }
}
