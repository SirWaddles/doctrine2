<?php

namespace Doctrine\Tests\Models\InheritanceJoins;

/**
 * @Entity
 */
class Start
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Base", inversedBy="starts")
     */
    private $bases;
}
