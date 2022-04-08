# flux-eco/json-schema-instance

This component is supposed to make a json schema instance for the transmitted values and schema.

help and support with the development very welcome :-)

https://json-schema.org/specification.html

The following example application demonstrates the usage:
https://github.com/flux-caps/todo-app

## Usage

account.yaml
```
title: account
type: object
aggregateRootNames:
    - account
properties:
  personId:
    type: number
  firstname:
    type: string
  lastname:
    type: string
  email:
    type: string
  type:
    type: string
  lastChanged:
    type: string
```

getAndPrintSchemaInstance.php

```
$schema = yaml_parse(file_get_contents('account.yaml'));

$schemaInstance = fluxJsonSchemaInstance\getSchemaInstance('Emmett', $schema['properties']['firstname']);
print_r($schemaInstance);

$schemaInstance = fluxJsonSchemaInstance\getSchemaInstance('123', $schema['properties']['personId']);
print_r($schemaInstance);
```

outputs
```
Array
(
    [value] => Emmett
    [describedBy] => {"type":"string"}
)
Array
(
    [value] => 123
    [describedBy] => {"type":"number"}
)
```

## Contributing :purple_heart:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... create pull requests :fire:

## Adjustment suggestions / bug reporting :feet:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... ask us for a Service Level Agreement: support@fluxlabs.ch :kissing_heart:
3. ... read and create issues

