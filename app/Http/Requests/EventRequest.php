<?php

namespace App\Http\Requests;


use App\Models\Types\EventTypes;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'event' => ['bail', 'required', function ($attribute, $value, $fail) {
                if (!in_array($value, EventTypes::toArray())) {
                    $fail($attribute . ' is invalid.');
                }
            }],
            'payload' => ['bail', 'required', 'array'],
            'payload.id' => ['bail', 'required', 'uuid'],
            'payload.name' => ['bail', 'sometimes', 'string'],
            'payload.stock' => ['bail', 'sometimes', 'integer', 'min:0'],
            'payload.price' => ['bail', 'sometimes', 'regex:/^\$(\d)+(\.(\d)+)?$/'],
        ];
    }


    /**
     * Handle a passed validation attempt.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function passedValidation()
    {
        $validatedData = $this->getValidatorInstance()->validated();

        $validatedData['payload']['uuid'] = $validatedData['payload']['id'];
        unset($validatedData['payload']['id']);

        if (isset($validatedData['payload']['price'])) {
            $validatedData['payload']['price'] = (double)substr($validatedData['payload']['price'], 1);
        }

        $this->validatedData = $validatedData;
    }
}
