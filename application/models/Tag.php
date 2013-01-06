<?php

/**
 * @Table(name="tags")
 * @Entity
 */
class Default_Model_Tag
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
    private $tagName;


    /**
     *
     * @var Article
     * @ManyToOne(targetEntity="Default_Model_Article", inversedBy="id", cascade={"persist"})
     */
    private $article;



    public function __construct()
    {
        $this->created = new \DateTime(date("Y-m-d H:i:s"));        
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

