<?php
    function getHero ($id) {
        $shId = $id;
        $apiKey = '10214230338425043';
        $curl = curl_init("https://www.superheroapi.com/api.php/{$apiKey}/{$shId}");
        curl_setopt_array($curl, [
            CURLOPT_CAINFO => __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10
        ]);

        $path = '../../cache/superheroes/'.md5($shId);

        if(file_exists($path) && time() - filemtime($path) < 172800) {
            $hero = json_decode(file_get_contents($path), true);
        }
        else {
            $hero = curl_exec($curl);
            if ($hero === false) {
                var_dump(curl_error($curl));
            } else {
                if (curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
                    file_put_contents($path, $hero);
                    $hero = json_decode($hero, true);
                }
            }
            curl_close($curl);
        }
        return $hero;
    }