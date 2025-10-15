<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8161412aed.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.jpg">
    <title>Vote - Treasurer</title>
</head>

<body>

    <div class="container bg-white p-5 mt-5 shadow-lg rounded">
        <h3 class="text-center mb-4">Preview Your Votes</h3>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Position</th>
                    <th>Selected Candidate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>President</td>
                    <td><?php echo $_SESSION['president_vote'] ?? 'Not selected'; ?></td>
                </tr>
                <tr>
                    <td>Treasurer</td>
                    <td><?php echo $_SESSION['treasurer_vote'] ?? 'Not selected'; ?></td>
                </tr>
                <tr>
                    <td>Secretary</td>
                    <td><?php echo $_SESSION['secretary_vote'] ?? 'Not selected'; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="president.php" class="btn btn-secondary">Go Back</a>
            <a href="submit_vote.php" class="btn btn-success">Confirm & Submit</a>
        </div>
    </div>
  
</body>
</html>
