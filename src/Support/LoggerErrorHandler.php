<?php
/**
 * 2019-06-13.
 */

declare(strict_types=1);

namespace App\Support;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Log\LoggerInterface;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\CallableResolverInterface;

class LoggerErrorHandler extends ErrorHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * LoggerErrorHandler constructor.
     *
     * @param ResponseFactoryInterface $responseFactory
     * @param LoggerInterface          $logger
     */
    public function __construct(ResponseFactoryInterface $responseFactory, LoggerInterface $logger, CallableResolverInterface $callableResolver)
    {
        parent::__construct($callableResolver,$responseFactory);
        $this->logger = $logger;
    }

    protected function logError(string $error): void
    {
        $this->logger->error($error);
    }
}
