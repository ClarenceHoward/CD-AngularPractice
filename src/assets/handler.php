<?php
// Get the POST data
$payload = file_get_contents('php://input');

// Decode the JSON payload
$data = json_decode($payload, true);

// Log the payload to a file
file_put_contents('webhook.log', print_r($data, true), FILE_APPEND);

// Initialize the success variable
$success = false;

// Process the webhook data
if ($data['action'] == 'push') {
    // Execute the build-and-deploy script
    $output = null;
    $return_var = null;
    exec('/var/www/html/CD-AngularPractice/dist/essentials/browser/build-and-deploy.sh', $output, $return_var);
    
    // Check if the script ran successfully
    if ($return_var === 0) {
        $success = true;
    }
}

// Respond to the server based on success
http_response_code(200);

if ($success) {
    echo "Webhook was successful, build-and-deploy script executed.";
} else {
    echo "Webhook received, but build-and-deploy script did not run successfully.";
}
?>
