<?php

namespace Percontmx\SportsCloud\Organizations\Services;

use Exception;

class OrganizationsServiceException extends Exception
{

    /**
     * @var array<string, string>
     */
    private $messages;


    public function __construct($messages, $code = 0, ?Exception $previous = null)
    {

        parent::__construct("Validation errors", $code, $previous);
        $this->messages = $messages;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

}
