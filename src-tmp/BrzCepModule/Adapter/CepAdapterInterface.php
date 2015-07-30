<?php

namespace BrzCepModule\Adapter;

interface CepAdapterInterface {
    public function getEnderecoByCep($cep);
    public function getEnderecoResponse();
}