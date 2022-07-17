<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/create', name: 'create_product')]
    public function createProduct(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $category = new Category();
        $category->setName('Computer');

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // relates this product to the category
        $product->setCategory($category);

        $entityManager->persist($category);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$product->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    #[Route('/product/{id}', name: 'show_product')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $categoryName = $product->getCategory()->getName();

        return new Response('Check out this great product: '.$product->getName().' of category: '.$categoryName);

            // or render a template
            // in the template, print things with {{ product.name }}
            // return $this->render('product/show.html.twig', ['product' => $product]);

            // public function show(int $id, ProductRepository $productRepository): Response
            // {
            //     $product = $productRepository
            //         ->find($id);

            //     // ...
            // }
        //         $repository = $doctrine->getRepository(Product::class);

        // // look for a single Product by its primary key (usually "id")
        // $product = $repository->find($id);

        // // look for a single Product by name
        // $product = $repository->findOneBy(['name' => 'Keyboard']);
        // // or find by name and price
        // $product = $repository->findOneBy([
        //     'name' => 'Keyboard',
        //     'price' => 1999,
        // ]);

        // // look for multiple Product objects matching the name, ordered by price
        // $products = $repository->findBy(
        //     ['name' => 'Keyboard'],
        //     ['price' => 'ASC']
        // );

        // // look for *all* Product objects
        // $products = $repository->findAll();
        
        // from inside a controller
            // $minPrice = 1000;

            // $products = $doctrine->getRepository(Product::class)->findAllGreaterThanPrice($minPrice);

// ...
    }

    #[Route('/product/edit/{id}', name: 'edit_product')]
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }

    #[Route('/product/delete/{id}', name: 'delete_product')]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('Product deleted');
    }
}
