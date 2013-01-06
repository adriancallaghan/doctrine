<?php


class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        $this->doctrineContainer = Zend_Registry::get('doctrine');
        $em = $this->doctrineContainer->getEntityManager();
        
        $user = new ZC\Entity\User();
        $user->firstname = 'Bob';
        $user->lastname = 'Biggins';
        
                $em->persist($user);
        $em->flush();
        
        $purchase1 = new ZC\Entity\Purchase();
        $purchase1->amount = 12.99;
        $purchase1->storeName = "3A";

        $purchase2 = new ZC\Entity\Purchase();
        $purchase2->amount = 2.99;
        $purchase2->storeName = "3B";
        
        $user->purchases = array($purchase1, $purchase2);
        
        
        $em->persist($user);
        $em->flush();
        
    }


}

