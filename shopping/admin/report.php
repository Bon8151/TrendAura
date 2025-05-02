<?php
// Database Connection (Update as needed)
$host = "localhost";
$username = "root";
$password = "";
$database = "shopping";

$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all tables except 'admin'
$tables = [];
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    if ($row[0] !== 'admin') { 
        $tables[] = $row[0];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrendAura Report Generate</title>
    <style>
        /* General Styles */
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
            margin: 0;
            overflow-x: hidden; /* Prevents horizontal scroll */
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            margin-bottom: 20px;
        }
        .dashboard-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .dashboard-btn:hover {
            background-color: #2980b9;
        }
        h2 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 20px;
        }
        
        /* Table Container */
        .table-container { 
            margin-bottom: 40px; 
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table Scroll Wrapper */
        .table-wrapper {
            max-height: 400px; /* Fixed Height */
            overflow-y: auto; /* Scroll enabled */
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Table Styles */
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: center; 
        }
        th { 
            background-color: #4CAF50; 
            color: white; 
            position: sticky; 
            top: 0; 
        }
        .no-data { 
            text-align: center; 
            font-weight: bold; 
            color: red; 
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="manage-users.php" class="dashboard-btn">⬅ Back to Dashboard</a>
    </div>

    <h2>TrendAura Report Generate</h2>

    <?php foreach ($tables as $table): ?>
        <div class="table-container">
            <h3>Table: <?php echo strtoupper($table); ?></h3>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <?php
                        // Fetch Column Names
                        $columnsResult = $conn->query("SHOW COLUMNS FROM $table");
                        while ($col = $columnsResult->fetch_assoc()) {
                            echo "<th>{$col['Field']}</th>";
                        }
                        ?>
                    </tr>

                    <?php
                    // Fetch Table Data
                    $dataResult = $conn->query("SELECT * FROM $table");
                    if ($dataResult->num_rows > 0) {
                        while ($row = $dataResult->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $value) {
                                echo "<td>{$value}</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . $columnsResult->num_rows . "' class='no-data'>No records found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php endforeach; ?>

</body>
</html>

<?php $conn->close(); ?>
