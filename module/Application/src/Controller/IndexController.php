<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;
use Zend\Db\Adapter\AdapterInterface;

class IndexController extends AbstractActionController 
{
     private $em;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

  
  // This is the default "index" action of the controller. It displays the 
  // Posts page containing the recent blog posts.
  public function indexAction() 
  {
    // Get recent posts
    $posts = $this->entityManager->getRepository(Post::class)
                     ->findBy(['status'=>Post::STATUS_PUBLISHED], 
                              ['dateCreated'=>'DESC']);
        
    // Render the view template
    return new ViewModel([
      'posts' => $posts
    ]);



  function ($container) {
      return new SomeServiceObject($container->get(AdapterInterface::class));
  }
  }
}