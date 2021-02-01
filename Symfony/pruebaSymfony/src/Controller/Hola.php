<?php
// src/Controller/Hola.php

namespace App\Controller;

use DOMDocument;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class Hola extends AbstractController
{
    /**
     * @Route ("/")
     */
    public function homepage(): Response
    {
        return new Response(
            '<html><body>Pagina principal</body></html>'
        );
    }

    /**
     *
     * @Route ("/hola")
     */
    public function saluda1(): Response
    {
        return new Response(
            '<html><body>Hola Mundo</body></html>'
        );
    }

    /**
     *
     * @Route ("/hola/{nombre}")
     */
    public function saluda($nombre)
    {
        return $this->render('saluda.html.twig', array("nombre" => $nombre));
    }

    /**
     *
     * @Route ("/adios/{nombre}")
     */
    public function adios(): Response
    {
        return new Response(
            '<html><body>Adios mundo cruel X_X</body></html>'
        );
    }


    public function mandar(SessionInterface $sesion): Response
    {
        $sesion->set("variable","Bitcoin loco");
        return $this->redirectToRoute('noticias');
    }

    /**
     *
     * @Route ("/noticias", name="noticias")
     */
    public function noticias(SessionInterface $sesion): Response
    {
        $titulo = $sesion->get("variable");
        $fichero = new DOMDocument();
        //$fichero->load("https://es.cointelegraph.com/rss");
        $fichero->load("https://www.coindesk.com/feed?x=1");
        $salida = array();
        $noticias = $fichero->getElementsByTagName("item");
        foreach ($noticias as $noticia) {
            $nuevo = array();
            $nuevo['titular'] = $noticia->getElementsByTagName("title")[0]->nodeValue;
            $nuevo["url"] = $noticia->getElementsByTagName("link")[0]->nodeValue;
            $salida[] = $nuevo;
        }

        return $this->render('noticia.html.twig', array ("filas" => $salida, "titulo"=>$titulo));
    }
}
