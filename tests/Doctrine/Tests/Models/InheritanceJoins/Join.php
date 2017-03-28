<?php

namespace Doctrine\Tests\Models\InheritanceJoins;

/**
 * @Entity
 */
class Join
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Child", inversedBy="joins")
     */
    private $child;
}
