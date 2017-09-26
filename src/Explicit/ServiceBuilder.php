<?php

namespace Okeyaki\Pimple\Explicit;

use Pimple\Container;

class ServiceBuilder
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
      * @var bool
      */
    private $protected;

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
                    'Failed to find the required service "%s".',
                    $this->id
                ));
            };
        }
    }

    /**
     * @return $this
     */
    public function protected()
    {
        $this->protected = true;

        return $this;
    }

    /**
     * @param callable $default
     */
    public function as(callable $default)
    {
        if ($this->protected) {
            $this->container[$this->id] = $this->container->protect($default);
        } else {
            $this->container[$this->id] = $default;
        }
    }

    /**
     * @param callable $default
     */
    public function default(callable $default)
    {
        if (!isset($this->container[$this->id])) {
            $this->as($default);
        }
    }
}
