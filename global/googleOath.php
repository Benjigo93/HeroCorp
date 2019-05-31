<?php
    require __DIR__ . '/../config/param.php';
    require __DIR__ . '/../vendor/autoload.php';

    use GuzzleHttp\Client;

    if(isset($_GET['code'])) {

        $client = new Client([
            'timeout' => 2.0,
            'verify' => __DIR__ . '/cacert.pem'
        ]);
        try {
            $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
            $discoveryJSON = json_decode((string)$response->getBody());
            $tokenEndpoint = $discoveryJSON->token_endpoint;
            $userinfoEndpoint = $discoveryJSON->userinfo_endpoint;
            $response = $client->request('POST', $tokenEndpoint, [
                'form_params' => [
                    'code' => $_GET['code'],
                    'client_id' => GOOGLE_ID,
                    'client_secret' => GOOGLE_SECRET,
                    'redirect_uri' => 'http://localhost/herocorp/pages/login/inscription.php',
                    'grant_type' => 'authorization_code'
                ]
            ]);
            $accessToken = json_decode($response->getBody())->access_token;
            $response = $client->request('GET', $userinfoEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer' . $accessToken
                ]
            ]);
            $response = json_decode($response->getBody());
            //dd($response);

        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            dd($exception->getMessage());
        }
    }