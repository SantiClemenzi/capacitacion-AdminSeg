<?php

namespace App\Controller;

use App\Entity\ProductCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductCategoryController extends AbstractController
{
    #[Route('/product/category', name: 'app_product_category')]
    
    public function createProductCategory(Request $request)
    {
        $productCategory = new ProductCategory();
        $form = $this->createFormBuilder($productCategory)
                     ->setMethod('POST')
                        ->add('name', TextType::class)
                        ->add('code', TextType::class)
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
        return $this->render('product_category/index.html.twig', [
            'controller_name' => 'ProductCategoryController',
        ]);
    }
}
