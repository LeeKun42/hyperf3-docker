<?php

namespace App\Exception\Handler;

use App\Libs\Log;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Qbhy\HyperfAuth\Exception\UnauthorizedException;
use Qbhy\SimpleJwt\Exceptions\TokenBlacklistException;
use Qbhy\SimpleJwt\Exceptions\TokenExpiredException;
use Qbhy\SimpleJwt\Exceptions\TokenRefreshExpiredException;
use Swow\Psr7\Message\ResponsePlusInterface;
use Throwable;

class AuthExceptionHandler extends ExceptionHandler
{

    public function handle(Throwable $throwable, ResponsePlusInterface $response)
    {
        $this->stopPropagation();
        Log::error($throwable->getMessage() . "\r\n" . $throwable->getTraceAsString());
        return $response->withStatus(401)->withBody(new SwooleStream('Unauthorized.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof UnauthorizedException ||
            $throwable instanceof TokenBlacklistException ||
            $throwable instanceof TokenExpiredException ||
            $throwable instanceof TokenRefreshExpiredException;
    }
}