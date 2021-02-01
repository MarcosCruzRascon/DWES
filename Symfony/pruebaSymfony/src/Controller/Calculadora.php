<?php
// src/Controller/Calculadora.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Calculadora extends AbstractController{
    /**
     * @Route ("/suma/{numero}/{numero2}", name="suma")
     */
    public function suma($numero, $numero2): Response
    {
        $suma = $numero + $numero2;
        return new Response(
            '<html><body>'.$suma.'</body></html>'
        );
    }

    /**
     * @Route ("/resta/{numero}/{numero2}", name="resta")
     */
    public function resta($numero, $numero2): Response
    {
        $resta = $numero - $numero2;
        return new Response(
            '<html><body>'.$resta.'</body></html>'
        );
    }

    /**
     * @Route ("/multiplicacion/{numero}/{numero2}", name="multiplicacion")
     */
    public function multiplicacion($numero, $numero2): Response
    {
        $multiplicacion = $numero * $numero2;
        return new Response(
            '<html><body>'.$multiplicacion.'</body></html>'
        );
    }


    /**
     * @Route ("/dividir/{numero}/{numero2}", name="dividir")
     */
    public function dividir($numero, $numero2): Response
    {
        $dividir = $numero / $numero2;
        return $this->render('operaciones.html.twig', array("numero" => $dividir));
    }
    

    /**
     * @Route ("/cuadrado/{num}", name="cuadrado")
     */
    public function cuadrado($num)
    {
        return $this->redirectToRoute('multiplicacion', array("numero"=>$num, "numero2"=>$num));

    }
}