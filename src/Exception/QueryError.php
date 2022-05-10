<?php

namespace GraphQL\Exception;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * This exception is triggered when the GraphQL endpoint returns an error in the provided query
 *
 * Class QueryError
 *
 * @package GraphQl\Exception
 */
class QueryError extends RuntimeException
{
    protected array $errorDetails;

    protected ?ResponseInterface $response;

    public function __construct(array $errorDetails, ?ResponseInterface $response = null)
    {
        $this->errorDetails = $errorDetails['errors'][0];
        $this->response = $response;
        parent::__construct($this->errorDetails['message']);
    }

    public function getErrorDetails(): array {
        return $this->errorDetails;
    }

    public function getResponse(): ?ResponseInterface {
        return $this->response;
    }
}