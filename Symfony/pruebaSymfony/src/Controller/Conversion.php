<?php
// src/Controller/Conversion.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class Conversion
{
    /**
     *@Route ("/cambio/{euros}/{moneda}")
     */
    public function cambio($euros, $moneda): Response
    {
        $moneda = strtoupper($moneda);
        //$datos = file_get_contents('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        //$fichero->load("https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
        $fichero = json_decode(file_get_contents("https://api.exchangeratesapi.io/latest?base=EUR"));


        $cambio = $fichero->rates->$moneda*$euros;
        return new Response('<html><body>'.$cambio.$moneda.'</body></html>');
    }

    /**
     *@Route ("/cambio/{moneda}")
     */
    public function cambioMoneda($moneda): Response
    {
        $moneda = strtoupper($moneda);
        //$datos = file_get_contents('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        //$fichero->load("https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
        $fichero = json_decode(file_get_contents("https://api.exchangeratesapi.io/latest?base=EUR"));


        $cambio = $fichero->rates->$moneda;
        return new Response('<html><body>'.$cambio.$moneda.'</body></html>');
    }
}
