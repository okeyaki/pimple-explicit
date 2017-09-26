<?php

namespace Okeyaki\Pimple\Explicit;

use Pimple\Container;

class ParameterBuilder
{
    /**
     * @var Pimple\Container
     */
    private $container;

    /**
     * @var string
     */
    private $id;

    /**
     * @param Pimple\Container $container
     * @param string $id
     */
    public function __construct(Container $container, $id)
    {
        $this->container = $container;

        $this->id = $id;
    }

    /**
     *
     */
    public function required()
    {
        if (!isset($this->container[$this->id])) {
            $this->container[$this->id] = function () {
                throw new \LogicException(sprintf(
                    'Failed to find the required parameter "%s".',
                    $this->id
                ));
            };
        }
    }

    /**
     * @param mixed $value
     */
    public function as($value)
    {
        $this->container[$this->id] = $value;
    }

    /**
     * @param mixed $value
     */
    public function default($value)
    {
        if (!isset($this->container[$this->id])) {
            $this->as($value);
        }
    }
}
