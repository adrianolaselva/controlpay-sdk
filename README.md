
[![version][packagist-badge]][packagist]
[packagist-badge]: https://img.shields.io/packagist/v/adrianolaselva/controlpay-sdk.svg
[packagist]: https://packagist.org/packages/adrianolaselva/controlpay-sdk
[![Build Status](https://travis-ci.org/adrianolaselva/controlpay-sdk.svg?branch=master)](https://travis-ci.org/adrianolaselva/controlpay-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/adrianolaselva/controlpay-sdk/build-status/master)

[![Total Downloads](https://poser.pugx.org/adrianolaselva/controlpay-sdk/downloads)](https://packagist.org/packages/adrianolaselva/controlpay-sdk)
[![Monthly Downloads](https://poser.pugx.org/adrianolaselva/controlpay-sdk/d/monthly)](https://packagist.org/packages/adrianolaselva/controlpay-sdk)
[![Daily Downloads](https://poser.pugx.org/adrianolaselva/controlpay-sdk/d/daily)](https://packagist.org/packages/adrianolaselva/controlpay-sdk)

[![License](https://poser.pugx.org/adrianolaselva/controlpay-sdk/license)](https://packagist.org/packages/adrianolaselva/controlpay-sdk)

## Componente de integração com API de ControlPay plataforma

Este Projeto tem por finalidade prover uma integração menos traumática e padronizada com as API's 
do ControlPay


### Descrição

Para iniciar o uso os seguintes passos devem ser executados

    * Passar como parâmetro no construtor em forma de array.

```php
$this->client = new \Integracao\ControlPay\Client([
    ControlPayParameterConst::CONTROLPAY_HOST => "http://...",
    ControlPayParameterConst::CONTROLPAY_TIMEOUT => 10,
    ControlPayParameterConst::CONTROLPAY_USER => "",
    ControlPayParameterConst::CONTROLPAY_PWD => "",
    ControlPayParameterConst::CONTROLPAY_KEY => ""
]);

$vendaApi = new VendaAPI($client);
```

    * Passar como parâmetro a partir de uma instância do Client.

```php
$client = new \Integracao\ControlPay\Client();

$client->setParameter(ControlPayParameterConst::CONTROLPAY_HOST, "http://...");
$client->setParameter(ControlPayParameterConst::CONTROLPAY_USER, "");
$client->setParameter(ControlPayParameterConst::CONTROLPAY_PWD, "");
$client->setParameter(ControlPayParameterConst::CONTROLPAY_TIMEOUT, 10);
$client->setParameter(ControlPayParameterConst::CONTROLPAY_KEY, "");

$vendaApi = new VendaAPI($client);
```

Para obter a versão configure seu composer.json conforme exemplo abaixo:

```json
{
    "name": "controlpay/composer-consumer",
    "authors": [
        {
            "name": "Adriano M. La Selva",
            "email": "adrianolaselva@gmail.com"
        }
    ],
    "require": {
        "adrianolaselva/controlpay-sdk": "0.1.0"
    },
	"prefer-stable" : true
}
```

Certifique-se que as configurações foram preenchidas corretamente executando os testes presentes no diretório "/vendor/adrianolaselva/controlpay-sdk/tests/*"

```sh
phpunit
```

[GitHub]: <https://github.com/adrianolaselva/controlpay-sdk.git>