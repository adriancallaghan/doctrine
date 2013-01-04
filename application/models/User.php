<?php
/**
 * @Entity
 * @Table(name="users")
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
     * @Column(type="string",length=60,nullable=true, unique=true)
     * @var string
     */
    private $email;
    
    
    
    /** @Column(type="string") */
    private $name;
 
 
    /**
     * @OneToMany(targetEntity="Default_Model_Address",mappedBy="Default_Model_User", cascade={"persist","remove"})
     */
    private $address;
    
    
    
    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property,$value)
    {
        $this->$property = $value;
    }

}
