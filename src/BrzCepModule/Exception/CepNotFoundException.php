<?php

namespace BrzCepModule\Exception;

class CepNotFoundException extends \Exception{
    public $message = "CEP não encontrado";
}