<?php

/**
 * @Entity
 * @Table(name="products")
 * @author Ade
 */
class Default_Model_Product
{
    /**
     *
     * @var integer $id
     * @Column(name="id", type="integer",nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @ManyToMany(targetEntity="Default_Model_Purchase", mappedBy="products", cascade={"ALL"})
     */
    private $purchases;

    /**
     *
     * @Column(type="string")
     */
    private $name;

    /**
     *
     * @Column(type="integer")
     */
    private $amount;


    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property,$value)
    {
        $this->$property = $value;
    }
}