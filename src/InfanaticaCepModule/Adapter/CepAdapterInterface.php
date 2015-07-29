<?php

namespace InfanaticaCepModule\Adapter;

interface CepAdapterInterface {
    public function getEnderecoByCep($cep);
    public function getEnderecoResponse();
}