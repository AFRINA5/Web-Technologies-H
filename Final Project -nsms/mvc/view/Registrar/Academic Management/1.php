<!DOCTYPE html>
<html>
<head>
    <title>Academic Record Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
    
    
    
    <style>/* Styles for the table */
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

/* Styles for the modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

#records-table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}

#records-table th, #records-table td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
}

#records-table th {
    background-color: #4CAF50;
    color: white;
}

#records-table tr:hover {
    background-color: #f5f5f5;
}
 </style>
</head>
<body>
    <h1>Academic Record Management</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['phone']; ?></td>
                    <td><?php echo $student['address']; ?></td>
                    <td><button class="view-button" data-id="<?php echo $student['id']; ?>">View Records</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="records-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Academic Records</h2>
            <div id="records-container"></div>
        </div>
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
$students = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
}

mysqli_close($conn);
?>
