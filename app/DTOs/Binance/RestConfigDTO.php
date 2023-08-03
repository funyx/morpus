<?php

namespace App\DTOs\Binance;

use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class RestConfigDTO extends ValidatedDTO
{
    public string $baseUrl;

    /**
     * Defines the validation rules for the DTO.
     */
    protected function rules(): array
    {
        return [
            'baseUrl' => ['required', 'string']
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     */
    protected function defaults(): array
    {
        return [];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     */
    protected function casts(): array
    {
        return [
            'baseUrl' => new StringCast()
        ];
    }

    /**
     * Maps the DTO properties before the DTO instantiation.
     */
    protected function mapBeforeValidation(): array
    {
        return [];
    }

    /**
     * Maps the DTO properties before the DTO export.
     */
    protected function mapBeforeExport(): array
    {
        return [];
    }

    /**
     * Defines the custom messages for validator errors.
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [];
    }
}
