<?php
class pregunta
{
    private $idpreguntas;
    private $tituloPregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuesta4;
    private $respuestaCorrecta;

    /**
     * Get the value of idpreguntas
     */
    public function gettituloPregunta()
    {
        return $this->tituloPregunta;
    }

    /**
     * Set the value of idpreguntas
     *
     * @return  self
     */
    public function settituloPregunta($tituloPregunta)
    {
        $this->tituloPregunta = $tituloPregunta;

        return $this;
    }

    /**
     * Get the value of idpreguntas
     */
    public function getIdpreguntas()
    {
        return $this->idpreguntas;
    }

    /**
     * Set the value of idpreguntas
     *
     * @return  self
     */
    public function setIdpreguntas($idpreguntas)
    {
        $this->idpreguntas = $idpreguntas;

        return $this;
    }


    /**
     * Get the value of respuesta1
     */
    public function getRespuesta1()
    {
        return $this->respuesta1;
    }

    /**
     * Set the value of respuesta1
     *
     * @return  self
     */
    public function setRespuesta1($respuesta1)
    {
        $this->respuesta1 = $respuesta1;

        return $this;
    }

    /**
     * Get the value of respuesta2
     */
    public function getRespuesta2()
    {
        return $this->respuesta2;
    }

    /**
     * Set the value of respuesta2
     *
     * @return  self
     */
    public function setRespuesta2($respuesta2)
    {
        $this->respuesta2 = $respuesta2;

        return $this;
    }

    /**
     * Get the value of respuesta3
     */
    public function getRespuesta3()
    {
        return $this->respuesta3;
    }

    /**
     * Set the value of respuesta3
     *
     * @return  self
     */
    public function setRespuesta3($respuesta3)
    {
        $this->respuesta3 = $respuesta3;

        return $this;
    }

    /**
     * Get the value of respuesta4
     */
    public function getRespuesta4()
    {
        return $this->respuesta4;
    }

    /**
     * Set the value of respuesta4
     *
     * @return  self
     */
    public function setRespuesta4($respuesta4)
    {
        $this->respuesta4 = $respuesta4;

        return $this;
    }

    /**
     * Get the value of respuestaCorrecta
     */
    public function getRespuestaCorrecta()
    {
        return $this->respuestaCorrecta;
    }

    /**
     * Set the value of respuestaCorrecta
     *
     * @return  self
     */
    public function setRespuestaCorrecta($respuestaCorrecta)
    {
        $this->respuestaCorrecta = $respuestaCorrecta;

        return $this;
    }
}
