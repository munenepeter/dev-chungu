<?php

namespace Chungu\Core\Mantle;

use Chungu\Core\Mantle\Request;

class Validator {



    private array $errors = [];

    /**
     * Validate
     * @param array $data
     * @param array $fields
     * @param array $messages
     * @return bool
     */
    public function validate(Request $request, array $rules, array $messages = []) {
        $data = $request->all(); // Assuming your Request object has an `all` method to retrieve data.

        $split = fn ($str, $separator) => array_map('trim', explode($separator, $str));

        $rule_messages = array_filter($messages, fn ($message) =>  is_string($message));

        $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

        foreach ($rules as $field => $option) {
            $fieldData = $data[$field] ?? null; // Retrieve data for the field.

            $rules = $split($option, '|');

            foreach ($rules as $rule) {
                $params = [];
                if (strpos($rule, ':')) {
                    [$rule_name, $param_str] = $split($rule, ':');
                    $params = $split($param_str, ',');
                } else {
                    $rule_name = trim($rule);
                }
                $fn = 'is_' . $rule_name;

                if (is_callable($fn)) {
                    $pass = $fn($fieldData, ...$params);
                    if (!$pass) {
                        $this->errors[$field] = sprintf(
                            $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                            $field,
                            ...$params
                        );
                    }
                }
            }
        }

        return empty($this->errors);
    }
    public function getErrors() {
        return $this->errors;
    }
}
