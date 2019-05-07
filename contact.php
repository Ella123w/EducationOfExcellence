<?php
$arr = array(
            'properties' => array(
                array(
                    'property' => 'email',
                    'value' => $_POST['email']
                ),
                array(
                    'property' => 'firstname',
                    'value' =>  $_POST['firstname']
                ),
                array(
                    'property' => 'lastname',
                    'value' => $_POST['secondname']
                ),
                array(
                    'property' => 'phone',
                    'value' => $_POST['phone']
                )
            )
        );
        $post_json = json_encode($arr);
        $hapikey = readline("Enter hapikey: (demo for the demo portal): ");
        $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=76a5d006-fbc6-4d04-9195-6faff739f874';
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        @curl_setopt($ch, CURLOPT_URL, $endpoint);
        @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = @curl_exec($ch);
        $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        @curl_close($ch);
        echo "curl Errors: " . $curl_errors;
        echo "\nStatus code: " . $status_code;
        echo "\nResponse: " . $response;
        setcookie('success', 'form send successfully', time() + (86400 * 30), "/");
        header("location: index.php");
?>