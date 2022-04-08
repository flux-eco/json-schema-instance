<?php

require_once __DIR__ . '/../vendor/autoload.php';


$schema = yaml_parse(file_get_contents('account.yaml'));

$schemaInstance = fluxJsonSchemaInstance\getSchemaInstance('Emmett', $schema['properties']['firstname']);
print_r($schemaInstance);

$schemaInstance = fluxJsonSchemaInstance\getSchemaInstance('123', $schema['properties']['personId']);
print_r($schemaInstance);