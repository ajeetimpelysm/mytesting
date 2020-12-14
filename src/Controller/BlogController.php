<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Input\AuthorRequest;

// Serializing

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_list")
     */
    public function list(ValidatorInterface $validator)
    {

        $author = new Author();

        $author->name = 'Acme Inc.';
        $author->description = '123 Main Street, Big City';
        $author->experties = "It's my testing";

        $serializer = $this->serialize();
        $json = $serializer->serialize($author, 'json');
        $companyCopy = $serializer->deserialize($json, Author::class, 'json');

        $errors = $validator->validate($companyCopy);
        $errorList = array();
        if (count($errors) > 0) {
            foreach($errors as $key => $value) {
               $errorList[$errors[$key]->getPropertyPath()] = $errors[$key]->getMessage();
            }
            return new Response(json_encode($errorList));
        }
    
        return new Response('The author is valid! Yes!');
    }


    public function serialize(){
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        return $serializer;
    }
}