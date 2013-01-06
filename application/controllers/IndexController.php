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
        $u = new Default_Model_User;
        $u->firstname = "John";
        $u->lastname = "Smith";
        
        $purchase1 = new Default_Model_Purchase();
        $purchase1->amount = 12.99;
        $purchase1->storeName = "3A";

        $purchase2 = new Default_Model_Purchase();
        $purchase2->amount = 2.99;
        $purchase2->storeName = "3B";
       

        $u->purchases = array($purchase1, $purchase2);
        $this->_em->persist($u);
        $this->_em->flush();


        $out ='';
        $out.= $u->id.'<br />';
        $out.= $u->firstname.'<br />';
        $out.= $u->lastname.'<br />';
        $out.= $u->purchases[0]->id.'<br />';
        $out.= $u->purchases[1]->id.'<br />';
        $out.='<hr/>';
        
  
        $users = $this->_em->createQuery('select u from Default_Model_User u')->execute();;
        $testEntity = $users[4];
        $out.= $testEntity->id.'<br />';
        $out.= $testEntity->firstname.'<br />';
        $out.= $testEntity->lastname.'<br />';
        $out.= $testEntity->purchases[0]->id.'<br />';
        $out.= $testEntity->purchases[1]->id.'<br />';

        $this->view->out = $out;

    }
    
    public function indexOldAction()
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

