<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canadian Provinces and Capitals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Canadian Provinces and Capitals</h1>
        <table>
            <thead>
                <tr>
                    <th>Province</th>
                    <th>Capital</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish connection to the database
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "canadian_database";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from the database
                $sql = "SELECT province, capital FROM provinces";
                $result = $conn->query($sql);

                if ($result !== false && $result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["province"]."</td><td>".$row["capital"]."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>0 results</td></tr>";
                }
                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    echo "Query executed successfully.";
                }
                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
