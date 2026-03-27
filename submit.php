<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (empty($name) || empty($email) || empty($phone)) {
        echo "<h3>Please fill in all the details.</h3>";
        exit;
    }

    $new_entry = array(
        "name" => $name,
        "email" => $email,
        "phone" => $phone
    );

    $file = 'data.json';
    $current_data = array();

    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        if (!empty($json_data)) {
            $decoded_data = json_decode($json_data, true);
            if (is_array($decoded_data)) {
                $current_data = $decoded_data;
            }
        }
    }

    $current_data[] = $new_entry;
    $final_json = json_encode($current_data, JSON_PRETTY_PRINT);

    if (file_put_contents($file, $final_json)) {
        echo "<h3>Data successfully saved!</h3>";
        echo "<a href='index.html'>Go Back to Form</a><br><br>";
        echo "<a href='data.json'>View JSON Data</a>";
    } else {
        echo "<h3>Error saving data. Ensure data.json has correct permissions.</h3>";
    }
} else {
    echo "<h3>Invalid Request Method</h3>";
}
?>
