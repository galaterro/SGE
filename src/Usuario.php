<?php

/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 20/02/2017
 * Time: 17:27
 */
class Usuario
{
    /**
     * @var
     */
    private $dni;
    /**
     * @var
     */
    private $nombre;
    /**
     * @var
     */
    private $apellidos;
    /**
     * @var
     */
    private $telefono;
    /**
     * @var
     */
    private $cp;
    /**
     * @var
     */
    private $puntos;
    /**
     * @var
     */
    private $usuario;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $id;

    /**
     * Usuario constructor.
     * @param $dni
     * @param $nombre
     * @param $apellidos
     * @param $telefono
     * @param $cp
     * @param $puntos
     * @param $usuario
     * @param $password
     */
    public function __construct($dni, $nombre, $apellidos, $telefono, $cp, $puntos, $usuario, $password)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->cp = $cp;
        $this->puntos = $puntos;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }





    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * @param mixed $puntos
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }




}


