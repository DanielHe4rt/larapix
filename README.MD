<center>
  <img src=".github/logo.png" alt="" height="200">
  <h3>Larapix, the OpenPix Client for Laravel</h3>
</center>

# Larapix, o SDK para OpenPix API.

[![Latest Version](https://img.shields.io/github/release/liuvIT/larapix.svg?style=flat-square)](https://github.com/liuvIT/larapix/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/liuv/larapix.svg?style=flat-square)](https://packagist.org/packages/liuvIT/larapix)

Larapix é um projeto criado para facilitar o consumo das API's do OpenPix no ecossistema Laravel em formato de
SDK.

- Fácil implementação em qualquer projeto
- Value Objects para facilitar implementação

```php
$service = new \DanielHe4rt\Larapix\Core\LarapixService();

$charge = new \DanielHe4rt\Larapix\Charges\Charge(
    'correlatedId', // ID used to track on your app
    1000 // Value to charge in cents (10,00)
);

$service->charges()->create($charge)
```

## Contribuções

Nós usamos as Issues do Github para relatar novos bugs e indicações de novas features, então nos avise caso tenha alguma
sugestão!

## Installing Larapix

Recomendamos você instalar o Larapix pelo [Composer](https://getcomposer.org/).

```bash
composer require danielhe4rt/larapix
```

## Versões Disponíveis

| Version | Status   | Packagist             | Namespace     | Docs | PSR-7 | PHP Version |
|---------|----------|-----------------------|---------------|------|-------|-------------|
| 1.x     | Running  | `liuv/larapix`        | `liuv`        | N/A  | No    | > = 7.0     |
| 2.x     | Planning | `danielhe4rt/larapix` | `danielhe4rt` | N/A  | No    | > = 8.x     |


## Licença

Larapix está disponível na licença do MIT. Por favor, leia [License File](LICENSE) para mais informações.