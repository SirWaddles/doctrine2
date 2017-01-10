<?php

namespace Doctrine\Tests\ORM\Functional\Ticket;

/**
 * @group DDC-1787
 */
class DDC1787Test extends \Doctrine\Tests\OrmFunctionalTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->schemaTool->createSchema(
            [
            $this->em->getClassMetadata(DDC1787Foo::class),
            $this->em->getClassMetadata(DDC1787Bar::class),
            ]
        );
    }

    public function testIssue()
    {
        $bar = new DDC1787Bar;
        $bar2 = new DDC1787Bar;

        $this->em->persist($bar);
        $this->em->persist($bar2);
        $this->em->flush();

        self::assertSame(1, $bar->getVersion());
    }
}

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"bar" = "DDC1787Bar", "foo" = "DDC1787Foo"})
 */
class DDC1787Foo
{
    /**
     * @Id @Column(type="integer") @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Version @Column(type="integer")
     */
    private $version;

    public function getVersion()
    {
        return $this->version;
    }
}

/**
 * @Entity
 */
class DDC1787Bar extends DDC1787Foo
{
}
