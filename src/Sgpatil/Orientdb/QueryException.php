<?php namespace Sgpatil\Orientdb;

use Sgpatil\Orientphp\Exception as OrientdbException;

class QueryException extends OrientdbException {

    public function __construct($query, $bindings = array(), $exception = null)
    {
        // Let's handle Orientdb exceptions into the QueryException so that we extract
        // relevant info from it and send a helpful decent exception.
        if ($exception instanceof Neo4jException)
        {
            $message = $this->formatMessage($exception);

            parent::__construct($message);
        }
        // In case this exception is an instance of any other exception that we should not be handling
        // then we throw it as is.
        elseif ($exception instanceof \Exception)
        {
            throw $exception;
        }
        // We'll just add the query that was run.
        else
        {
            parent::__construct($query);
        }
    }

    /**
     * Format the message that should be printed out for devs.
     *
     * @param  \\Orientdb\Exception $exception
     * @return string
     */
    protected function formatMessage(Neo4jException $exception)
    {
        $data = $exception->getData();
        $exceptionName = isset($data['exception']) ? $data['exception'] .': ' : '';
        $message = isset($data['message']) ? $data['message'] : $exception->getMessage();
        return $exceptionName.$message;
    }
}
