<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\PostRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="all")
     * @Template
     */
    public function index(PostRepository $postRepository)
    {
        /**
         * TODO : Write your code after this comment
         */

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        return $this->render('home/index.html.twig', array(
            'posts' => $posts
        ));
    }

    /**
     * @Route("/recent", name="last")
     * @Template
     */
    public function getLatestPost(PostRepository  $postRepository)
    {
        /**
         * TODO : Write your code after this comment
         */
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findLast();

        return $this->render('home/get_latest_post.html.twig', array(
            'post' => $post
        ));
    }

}
