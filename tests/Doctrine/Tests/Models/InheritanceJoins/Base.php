<?php

namespace Doctrine\Tests\Models\InheritanceJoins;

/**
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"child" = "Child"})
 * @Entity
 */
abstract class Base
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @OneToMany(targetEntity="DoctrineTestStart", mappedBy="bases")
     */
    private $starts;
}
