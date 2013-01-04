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
        $testEntity->name = 'Dude';
        $testEntity->email = uniqid().'@email.co.uk';
        //$testEntity->setAddress('TEST');
        //$this->_em->persist($testEntity);
        //$this->_em->flush();
        
        
        // retrieve
        //$users = $this->_em->createQuery('select u from Default_Model_User u')->execute();
        //$last = end($users);
        //print_r($last);

        
        $address1 = new Default_Model_Address();
        $address1->address_details = "3A";

        $address2 = new Default_Model_Address();
        $address2->address_details = "4A";
        
        $testEntity->address = array($address1, $address2);
        
        
        $this->_em->persist($testEntity);
        $this->_em->flush();
        
        $out ='';
        $out.= $testEntity->id.'<br />';
        $out.= $testEntity->name.'<br />';
        $out.= $testEntity->email.'<br />';
        $out.= print_r($testEntity->address->toArray(),true);
        $out.='<hr/>';
        
  
        $users = $this->_em->createQuery('select u from Default_Model_User u')->execute();
        $testEntity = $users[10];
        $out.= $testEntity->id.'<br />';
        $out.= $testEntity->name.'<br />';
        $out.= $testEntity->email.'<br />';
        //$out.= $testEntity->address ? print_r($testEntity->address->toArray(),true) : 'Empty';

        $this->view->out = $out;

    }


}

