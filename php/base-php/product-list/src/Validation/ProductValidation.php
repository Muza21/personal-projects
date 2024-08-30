<?php

namespace Validation;

class ProductValidation {
    private $errors = [];
    private $data;
    private $db;
    private $requiredFields = ['sku', 'name', 'price', 'productType'];
    private $specialAttributes = [
        'DVD' => ['size'],
        'Book' => ['weight'],
        'Furniture' => ['height', 'width', 'length']
    ];
    public function __construct($data,$db) {
        $this->data = $data;
        $this->db = $db;
    }

    public function validate(): bool
    {
        $validRequired = $this->validateRequiredFields();
        $validAttributes = $this->validateSpecialAttribute();
        if($validRequired && $validAttributes){
            $validSKU = $this->validateUniqueSKU();
            $validNumbers = $this->validateNumericValue();
        }
        $valid = $validSKU && $validNumbers;
        return $valid;
    }

    private function validateRequiredFields(): bool
    {
        foreach ($this->requiredFields as $field) {
            if (!$this->string($this->data[$field])) {
                $this->addError($field, "Please, submit required data.");
            }
        }
        return empty($this->errors);
    }

    public function validateSpecialAttribute(): bool
    {
        $productType = $this->data['productType'];
        if (isset($this->specialAttributes[$productType])) {
            $requiredAttributes = $this->specialAttributes[$productType];
            foreach ($requiredAttributes as $attribute) {
                if (!$this->string($this->data['specialAttribute'][$attribute])) {
                    $this->addError($attribute, "Please, submit required data.");
                }
            }
        }
        return empty($this->errors);
    }

    public function validateUniqueSKU(): bool
    {
        if(!$this->unique($this->data['sku'],'products','SKU')){
            $this->addError('sku', "SKU must be unique.");
        }
        return empty($this->errors);
    }

    private function validateNumericValue(): bool
    {
        if(!$this->number($this->data['price'])){
            $this->addError('price', "Please, provide the data of indicated type.");
        }
        foreach ($this->specialAttributes[$this->data['productType']] as $attribute) {
            if (!$this->number($this->data['specialAttribute'][$attribute])){
                $this->addError($attribute, "Please, provide the data of indicated type.");
            }
        }
        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    private function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    private function unique($value,$table,$column): bool
    {
        $query = "select count(*) from $table where $column = ?";
        $statement = $this->db->query($query, [$value]);
        return $statement->fetchColumn() === 0;
    }

    private function number($value): bool
    {
        return is_numeric($value);
    }
}