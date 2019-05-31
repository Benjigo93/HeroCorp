<?php
    if(isset($_GET['e'])){
        switch ($_GET['e']) {
            case 0:
                $errorMessage = 'The form could not be sent !';
                break;
            case 1:
                $errorMessage = 'A field is empty !';
                break;
            case 2:
                $errorMessage = 'The nickname is already taken !';
                break;
            case 3:
                $errorMessage = 'The email id is already registered !';
                break;
            case 4:
                $errorMessage = 'The nickname must be between 3 and 15 characters !';
                break;
            case 5:
                $errorMessage = 'Some used characters are not allowed in the password !';
                break;
            case 6:
                $errorMessage = 'Some used characters are not allowed in the nickname !';
                break;
            case 7:
                $errorMessage = 'Invalid email address !';
                break;
            case 8:
                $errorMessage = 'The password is different !';
                break;
        }
    }