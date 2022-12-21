<?php

namespace App\Controller;
use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        // $articles=['Article1','Article2','Article3'];
        // return $this->render('articles/index.html.twig', [
        //     'articles' => $articles,
        // ]);

        $articles=$this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig', ['articles' => $articles, ]);
    }

     /**
     * @Route("/article/save")
     */
    public function save(){
        $entityManger=$this->getDoctrine()->getManager();


        $article= new Article();
        $article->setNom('Article 1');
        $article->setPrix(10);
        
        $entityManger->persist($article);
        $entityManger->flush();

        return new  Response('Article enregiste avec id  '.$article->getId());
    }

    /**
     * @Route("/article/new , name=new_article")
     * Method{{"GET","POST"}}
     */
    public function new(Request $request)
    {
        $article= new Article();
        $form = $this->createFormBuilder($article)
            ->add('nom', TextType::class)
            ->add('prix', TextType::class)
            ->add('save', SubmitType::class,array(
                'label'=>'creer')
        )->getForm();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $article= $form->getData();

            $entityManger=$this->getDoctrine()->getManager();
            $entityManger->persist($article);
            $entityManger->flush();

            
        }
        // return $this->redirectToRoute('');
        return $this->render('articles/new.html.twig',['form'=> $form->createView()]);
    }
    
}