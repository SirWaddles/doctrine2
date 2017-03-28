<?php

namespace Doctrine\Tests\Models\InheritanceJoins;

/**
 * @Entity
 */
class Child extends Base
{
    /**
     * @OneToMany(targetEntity="Join", mappedBy="child")
     */
    private $joins;
}
