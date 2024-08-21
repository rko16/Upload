<?php

namespace App\Validators;

use GuzzleHttp\Client;

class ReCaptcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new Client;

        $response = $client->post(  // Fixed the missing '='
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [  // Fixed 'form_param' to 'form_params'
                    'secret' => config('services.recaptcha.secret'),
                    'response' => $value,
                ],
            ]
        );

        $body = json_decode((string) $response->getBody());
        return $body->success;
    }
}
