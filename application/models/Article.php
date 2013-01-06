<?php

/**
 * 
 * @Table(name="articles")
 * @Entity
 * @author Ade
 */
class Default_Model_Article
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
     * @Column(type="string",length=60,nullable=false)
     * @var string
     */
    private $heading;
    
    /**
     * @Column(type="string",length=60,nullable=false)
     * @var string
     */
    private $content;
    
    
    
    /**
     * @OneToMany(targetEntity="Default_Model_Tag", mappedBy="article", cascade={"persist"})
     * @var     Doctrine\Common\Collections\ArrayCollection
     */
    protected $tags = null;

    
    public function __get($property)
    {
        return $this->$property;
    }
    
    public function __set($property,$value)
    {
        $this->$property = $value;
    }

    /**
     * @return  Doctrine\Common\Collections\ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }
 
    /**
     * @param   \Doctrine\Common\Collections\ArrayCollection    $tags
     * @return  void
     */
    public function setTags(Doctrine\Common\Collections\ArrayCollection $tags)
    {
        $this->tags = $tags;
    }
    
    public function __construct() {
        $this->setTags(new Doctrine\Common\Collections\ArrayCollection());
    }
}

