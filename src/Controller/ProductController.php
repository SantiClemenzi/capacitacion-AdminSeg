<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]

    public function createProductCategory(Request $request)
    {
        $product = new Product;
        $form = $this->createFormBuilder($product)
                     ->setMethod('POST')
                        ->add('name', TextType::class)
                        ->add('code', TextType::class)
                        ->add('category', TextType::class)
                        ->add('submit', SubmitType::class)
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
        }

        return $this->render('product_category/index.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
