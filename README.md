## Componente de integração com API de ControlPay plataforma

Este Projeto tem por finalidade prover uma integração menos traumática e padronizada com as API's 
do ControlPay

### Descrição

Para iniciar o uso os seguintes passos devem ser executados

    * Passar como parâmetro no construtor em forma de array.

```php
$client = new Integracao\ControlPay\Client([
    "CONTROLPAY_HOST"  => "",
    "CONTROLPAY_USER"  => "",
    "CONTROLPAY_PWD"  => "",
    "CONTROLPAY_TIMEOUT"  => ""
]);
```

    * Passar como parâmetro a partir de uma instância do Client.

```php
$client = new Integracao\ControlPay\Client();

$client->setParameter(ControlPayParameter::CONTROLPAY_HOST, "");
$client->setParameter(ControlPayParameter::CONTROLPAY_USER, "");
$client->setParameter(ControlPayParameter::CONTROLPAY_PWD, "");
$client->setParameter(ControlPayParameter::CONTROLPAY_TIMEOUT, 5000);

$pedidoApi = new PedidoAPI($client);
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
        "controlpay/ntk-pedido-sdk": "0.1.0"
    },
    "repositories": [{
        "type": "vcs",
		"url": "https://ntkdesenv@bitbucket.org/controlpay/controlpay-sdk.git"
    }],
	"minimum-stability": "dev",
	"prefer-stable" : true
}
```

Certifique-se que as configurações foram preenchidas corretamente executando os testes presentes no diretório "/vendor/adrianolaselva/controlpay-sdk/tests/*"

```sh
./tests/execute.sh
```

[Bitbucket]: <https://ntkdesenv@bitbucket.org/adrianolaselva/controlpay-sdk.git>