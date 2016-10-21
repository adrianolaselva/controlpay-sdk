## Componente de integração com API de ControlPay plataforma

Este Projeto tem por finalidade prover uma integração menos traumática e padronizada com as API's 
do ControlPay

### Descrição

Para iniciar o uso os seguintes passos devem ser executados

    * Passar como parâmetro no construtor em forma de array.

```php
$this->client = new \Integracao\ControlPay\Client([
    ControlPayParameter::CONTROLPAY_HOST => "http://...",
    ControlPayParameter::CONTROLPAY_TIMEOUT => 10,
    ControlPayParameter::CONTROLPAY_USER => "",
    ControlPayParameter::CONTROLPAY_PWD => "",
    ControlPayParameter::CONTROLPAY_KEY => ""
]);

$vendaApi = new VendaAPI($client);

```

    * Passar como parâmetro a partir de uma instância do Client.

```php
$client = new \Integracao\ControlPay\Client();

$client->setParameter(ControlPayParameter::CONTROLPAY_HOST, "http://...");
$client->setParameter(ControlPayParameter::CONTROLPAY_USER, "");
$client->setParameter(ControlPayParameter::CONTROLPAY_PWD, "");
$client->setParameter(ControlPayParameter::CONTROLPAY_TIMEOUT, 10);
$client->setParameter(ControlPayParameter::CONTROLPAY_KEY, "");

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