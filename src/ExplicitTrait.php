<?php

namespace Okeyaki\Pimple;

use Okeyaki\Pimple\Explicit\ParameterBuilder;
use Okeyaki\Pimple\Explicit\ServiceBuilder;

trait ExplicitTrait
{
    /**
     * @param string $id
     *
     * @return Okeyaki\Pimple\Explicit\ParameterBuilder
     */
    public function parameter($id)
    {
        return new ParameterBuilder($this, $id);
    }

    /**
     * @param string $id
     *
     * @return Okeyaki\Pimple\Explicit\ServiceBuilder
     */
    public function service($id)
    {
        return new ServiceBuilder($this, $id);
    }
}
