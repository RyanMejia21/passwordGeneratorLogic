<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordLength = $_POST["passwordLength"];
    $generatedPassword = generateRandomPassword($passwordLength);
}
else {
    // Fallback in case the form is accessed directly without submitting
    $generatedPassword = "";
}

function generateRandomPassword($length) 
{
    // Define the characters to be used in the password
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?";

    // Shuffle the characters to ensure randomness
    $shuffledCharacters = str_shuffle($characters);

    // Get the first $length characters from the shuffled list
    $randomPassword = substr($shuffledCharacters, 0, $length);

    return $randomPassword;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Password Generator</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Random Password Generator</h1>
        <form action="generate_password.php" method="post">
            <div class="form-group">
                <label for="passwordLength">Password Length:</label>
                <input type="number" class="form-control" id="passwordLength" name="passwordLength" min="6" max="20" value="12">
            </div>
            <button type="submit" class="btn btn-primary">Generate Password</button>
        </form>
        <div class="mt-3">
            <label for="generatedPassword">Generated Password:</label>
            <input type="text" class="form-control" id="generatedPassword" value="<?php echo $generatedPassword; ?>" readonly>
        </div>
    </div>

    <!-- Add Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
