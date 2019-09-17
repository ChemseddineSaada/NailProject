<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SingleController extends AbstractController
{
    /**
     * @Route("/product/{slug}", name="single.show.product")
     */
    public function singleProduct($slug)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->findById($slug);

        return $this->render('shop/singles/product.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/category/{slug}", name="single.show.category")
     */
    public function singleCategory($slug)
    {
        $category = $this->getDoctrine()->getRepository(category::class)->findById($slug);

        return $this->render('singles/category.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/article/{slug}", name="single.show.article")
     */
    public function singleArticle($slug)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findById($slug);

        return $this->render('singles/article.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/subscription/{slug}", name="single.show.subscription")
     */
    public function singleSubscription($slug)
    {
        $subscription = $this->getDoctrine()->getRepository(Subscription::class)->findById($slug);

        return $this->render('singles/subscription.html.twig', [
            'subscription' => $subscription,
        ]);
    }
}
