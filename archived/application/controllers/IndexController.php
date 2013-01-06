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
        $testId = uniqid();
        
        // action body
        $article = new Default_Model_Article();
        $article->heading = "Heading test: $testId";
        $article->content = "Content test: $testId";
        $this->_em->persist($article);
        
        
        $tag1 = new Default_Model_Tag();
        $tag1->tagName = "Tag1 test: $testId";
        $this->_em->persist($tag1);
   
        $tag2 = new Default_Model_Tag();
        $tag2->tagName = "Tag2 test: $testId";
        $this->_em->persist($tag2);
        
        
        $article->tags = array($tag1, $tag2);
        $this->_em->persist($article);
        
        
        $this->_em->flush();

        
        ///// test 

        $out ='';
        $out.= get_class($article).'<br />';
        $out.= $article->id.'<br />';
        $out.= $article->heading.'<br />';
        $out.= $article->content.'<br />';
        $out.= $article->tags[0]->id.'<br />';
        $out.= $article->tags[0]->tagName.'<br />';
        $out.= "AI: ".$article->tags[0]->article.'<br />';
        $out.= $article->tags[1]->id.'<br />';
        $out.= $article->tags[1]->tagName.'<br />';
        $out.= "AI: ".$article->tags[1]->article.'<br />';
        $out.='<hr/>';
        
  
        $users = $this->_em->createQuery('select u from Default_Model_Article u')->execute();
        $testEntity = $users[1];
        $out.= get_class($testEntity).'<br />';
        $out.= $testEntity->id.'<br />';
        $out.= $testEntity->heading.'<br />';
        $out.= $testEntity->content.'<br />';
        $out.= $testEntity->tags[0]->id.'<br />';
        $out.= $testEntity->tags[0]->tagName.'<br />';
        $out.= "AI: ".$testEntity->tags[0]->article.'<br />';
        $out.= $testEntity->tags[1]->id.'<br />';
        $out.= $testEntity->tags[1]->tagName.'<br />';
        $out.= "AI: ".$testEntity->tags[1]->article.'<br />';

        $this->view->out = $out;

    }
    
    


}

