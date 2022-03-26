<?php

namespace FluxEco\JsonSchemaInstance\Core\Application\Commands;

use FluxEco\JsonSchemaInstance\Core\{Application, Domain};


class ProvideObjectSchemaInstanceHandler implements ProvideSchemaInterfaceHandler
{
    public function __construct()
    {

    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * @throws \JsonException
     */
    public function handle(ProvideSchemaInstanceCommand $command): Domain\Models\ObjectSchemaInstance
    {
        $properties = Domain\Models\ObjectSchemaInstanceProperties::new();
        $value = $command->getValue();

        //todo check this
        if ($value === 'null') {
            return Domain\Models\ObjectSchemaInstance::new($properties);
        }

        $schema = $command->getSchema();
        //print_r($schema);
        $handlerMapping = $command->getHandlerMapping();

        $keyValueArray = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        print_r($keyValueArray);

        foreach ($keyValueArray as $key => $propertyValue) {
            //todo
            if($key === 'id') {
                continue;
            }

            //todo check this - null values delete or ignore?
            if (is_null($propertyValue)) {
                continue;
            }

            echo "schema".PHP_EOL;
            print_r($schema);
            echo PHP_EOL.PHP_EOL;

            $this->assertPropertyKeyExistsInSchema($key, $schema['properties']['rootObject']['properties']);


            $subSchema = $schema['properties']['rootObject']['properties'][$key];
            $type = $subSchema['type'];
            $handler = $handlerMapping[$type];

            $propertyValueAsString = $propertyValue;
            if (is_array($propertyValueAsString)) {
                $propertyValueAsString = json_encode($propertyValueAsString, JSON_THROW_ON_ERROR);
            }

            $command = ProvideSchemaInstanceCommand::new($propertyValueAsString, $subSchema, $handlerMapping);
            $properties->offsetSet($key, $this->process($command, $handler));
        }


        return Domain\Models\ObjectSchemaInstance::new($properties);
    }

    private function process(ProvideSchemaInstanceCommand $command, ProvideSchemaInterfaceHandler $handler): Domain\Models\SchemaInstance
    {
        return $handler->handle($command);
    }

    private function assertPropertyKeyExistsInSchema(string $key, array $schemaProperties): void
    {
        if (array_key_exists($key, $schemaProperties) === false) {
            throw new \Exception('Property key ' . $key . ' is not valid for this schema' . print_r($schemaProperties));
        }
    }


}

