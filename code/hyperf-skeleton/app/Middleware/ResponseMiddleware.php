<?php

declare(strict_types=1);

namespace App\Middleware;

use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ResponseMiddleware implements MiddlewareInterface
{
    public function __construct(protected ContainerInterface $container)
    {

    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $code = 0;
        $message = 'success';

        $response = $handler->handle($request);

        $content = $response->getBody()->getContents();
        $ctx = new \stdClass();
        if (!empty($content)){
            $arr = json_decode($content, true);
            if (is_array($arr)){
                $ctx = $arr;
            }else{
                $ctx = $content;
            }
        }
        $newContent = [
            'code'    => $code,
            'message' => $message,
            'data'    => $ctx
        ];
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response->withBody(new SwooleStream(json_encode($newContent, JSON_UNESCAPED_UNICODE)));
    }
}
