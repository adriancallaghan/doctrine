<?php

/**
 * 
 * @Table(name="users")
 * @Entity
 * @author Ade
 */
class Default_Model_User
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
     * @Column(type="string",length=60,nullable=true)
     * @var string
     */
    private $firstname;
    
    /**
     * @Column(type="string",length=60,nullable=true)
     * @var string
     */
    private $lastname;


    /**
     *
     * @param \Doctrine\Common\Collections\Collection $property
     *
     * @OneToMany(targetEntity="Default_Model_Purchase",mappedBy="user", cascade={"persist","remove"})
     */
    private $purchases;

    
    public function __get($property)
    {
        return $this->$property;
    }
    
    public function __set($property,$value)
    {
        $this->$property = $value;
    }

}

