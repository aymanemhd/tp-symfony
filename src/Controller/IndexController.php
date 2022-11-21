<?php

namespace App\Controller;
use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\type\Texttype;
use Symfony\Component\Form\Extension\Core\type\Submittype;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        $articles=['Article1','Article2','Article3'];
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

     /**
     * @Route("/article/save")
     */
    public function save(){
        $entityManger=$this->$this->getDoctrine()->getManager();


        $article= new Article();
        $article->setNom('Article 1');
        $article->setPrix(1000);
        
        $entityManger->persist($article);
        $entityManger->flush();

        return new  Response('Article enregiste avec id  '.$article->getId());
    }
    
}