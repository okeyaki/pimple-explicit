# Pimple Explicit

Pimple Explicit makes it able to define parameters and services explicitly.

## Usage

```
class Container extends \Pimple\Container
{
    use \Okeyaki\Pimple\ExplicitTrait;
}

$container = new Container();
```

```
$container->parameter('id')
    ->as('a');
```

#### Default Parameters

```
$container->parameter('id')
    ->as('a');

$container->parameter('id')
    ->default('b');

$container['id']; // Returns 'a'.
```

#### Required Parameters

```
$container->parameter('id')
    ->required();
```

#### Default Services

```
$container->service('id')
    ->default(function () {
        return new \stdClass();
    });
```

#### Protected Services

```
$container->service('id')
    ->protected()
    ->default(function () {
        return new \stdClass();
    });
```

#### Required Services

```
$container->service('id')
    ->required();
```
