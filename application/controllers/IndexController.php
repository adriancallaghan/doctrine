<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $registry = Zend_Registry::getInstance();
        $this->_em = $registry->entitymanager;
    }

    public function indexAction()
    {
        // action body
        $testEntity = new Default_Model_User;
        $testEntity->setName('Hector Pinol');
        $this->_em->persist($testEntity);
        $this->_em->flush();
    }


}

