<?php

/**
 * @Entity
 * @Table(name="address")
 * @author ade
 */
class Default_Model_Address
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
     * @Column(type="string")
     */
    private $address_details;

    
     /**
     *
     * @var User
     * @ManyToOne(targetEntity="Default_Model_User")
     * @JoinColumns({
     *  @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    
    

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property,$value)
    {
        $this->$property = $value;
    }
}