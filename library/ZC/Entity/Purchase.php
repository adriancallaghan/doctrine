<?php

namespace ZC\Entity;
/**
 * @Table(name="purchases")
 * @Entity
 */
class Purchase
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
     * @var datetime
     * @Column(type="datetime", nullable=false)
     */
    private $created;

    /**
     *
     * @var string
     * @Column(type="string") 
     */
    private $storeName;

    /**
     *
     * @var decimal
     *
     * @Column(type="integer",precision=2,scale=4)
     */
    private $amount = 0;

    /**
     *
     * @var User
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *  @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


    /**
     * @ManyToMany(targetEntity="Product", inversedBy="purchases", cascade={"persist,remove"})
     * @JoinTable(name="purchases_products",
     *  joinColumns={@JoinColumn(name="purchase_id", referencedColumnName="id")},
     *  inverseJoinColumns={@JoinColumn(name="product_id",referencedColumnName="id")})
     */
    private $products;

    public function __construct()
    {
        $this->created = new \DateTime(date("Y-m-d H:i:s"));
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property,$value)
    {
        $this->$property = $value;
    }

}

