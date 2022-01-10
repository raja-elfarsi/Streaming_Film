<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
#use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Cocur\Slugify\Slugify;

class propertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em= $em;
    }
    /**
     * @Route("/billets",name="property.index")
     * @return Response
     */
    public function index():Response{
           $property= $this->repository->findOneById();
           
            return $this->render("property/index.html.twig",[
                'current_menu' => 'properties'
            ]);
    }
    /**
     * @Route("/billets/{slug}-{id}",name="property.show")
     * @return Response
     */
    public function show(Property $property,string $slug): Response{
        if($property->getSlug()!== $slug){
                return $this->redirectToRoute('property.show',['id' => $property->getId(),
                'slug'=> $property->getSlug()
            ],301);
        }   
        return $this->render('property/show.html.twig',[
                'property'=> $property,
                'current_menu' => 'properties'
            ]);
    }
}