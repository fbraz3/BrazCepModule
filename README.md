# InfanaticaCepModule by Felipe Braz

Módulo em Zend Framework 2 para consulta de endereço via CEP com cache em banco de dados

Este módulo detecta a instalação do orm ORM [Doctrine] (http://www.doctrine-project.org/) e usa o banco de dados para cache de query, tornando sua consulta mais rápida e garantindo retorno de dados mesmo se o webservice estiver fora do ar.

# Pré-Requisitos
- É necessário que o ORM [Doctrine] (http://www.doctrine-project.org/) esteja instalado em seu projeto zend.
- Seu orm deve responder através do serviceLocator por 'doctrine.entitymanager.orm_default'

# Instalação

#### Instalação via clone

Clonar o projeto [InfanaticaCepModule](https://github.com/fbraz3/InfanaticaCepModule.git) na pasta "./vendor" ou "./module" no seu projeto em Zend Framework 2

```bash
    $ cd PASTA_DO_SKELETON_DO_ZEND_FRAMEWORK2
    $ cd vendor
    $ git clone https://github.com/fbraz3/InfanaticaCepModule.git
```

#### Instalação via composer

Adicionar o projeto [InfanaticaCepModule](https://github.com/fbraz3/InfanaticaCepModule.git) no seu composer.json:


```json
     "repositories": [
        {
          "type": "git",
          "url": "https://github.com/fbraz3/InfanaticaCepModule"
        }
      ],
      "require": {
        "fbraz3/infanatica-cep-module": "dev-master"
      },
```
Executar o comando "update" ou "install" do composer para fazer download do [InfanaticaCepModule](https://github.com/fbraz3/InfanaticaCepModule)

```bash
    $ php composer.phar update
```

###### Método 2

Executar o comando "require" do composer para atualizar o seu composer.json e efetuar o download do [InfanaticaCepModule](https://github.com/fbraz3/InfanaticaCepModule)

```bash
	php composer.phar require fbraz3/infanatica-cep-module dev-master
```


#### Após a Instalação

Adicionar ao seu arquivo `application.config.php` 

```php
    <?php
    return array(
        'modules' => array(
            // ...
            'InfanaticaCepModule',
        ),
        // ...
    );
```

Executar em seu banco de dados o arquivo **table.sql**

# Utilização do Service 
#### Exemplo no \Application\Controller\InderController

```php
	<?php
	//...
	class IndexController extends AbstractActionController
	{
		public function indexAction()
	    {
			$cep = '21041020';

			// Possíveis formatos (json, xml, query, object, array)
			// null = \InfanaticaCepModule\Response\EnderecoResponse
			$formato        = 'json';

			$serviceLocator = $this->getServiceLocator();
			$cepService     = $serviceLocator->get('InfanaticaCepModule\Service\CepService');
			$endereco       = $cepService->getEnderecoByCep($cep,$formato);
			var_dump($endereco);

	        return new ViewModel();
	    }
    //...
```

# Utilização do Controller 
#### Exemplos de rota para:
#### \InfanaticaCepModule\Controller\CepController


http[s]://domain/cep/NUMERO_DO_CEP</div>

http[s]://domain/cep/21041020</div>

http[s]://domain/cep/NUMERO_DO_CEP/FORMATO_DE_SAIDA</div>

http[s]://domain/cep/21041020/json

http[s]://domain/cep/21041020/xml


# Referências dos Adapters de pesquisa de CEP

[ViaCEP](http://viacep.com.br/)

[Postmon](http://postmon.com.br/)

[Correio Control](http://avisobrasil.com.br/correio-control/api-de-consulta-de-cep/)

[Republica Virtual](http://www.republicavirtual.com.br/cep/)


# Desenvolvido por
Felipe Braz (https://www.braz.pro.br/blog/)

Baseado no projeto [InfanaticaCepModule] (https://github.com/Infanatica/InfanaticaCepModule)