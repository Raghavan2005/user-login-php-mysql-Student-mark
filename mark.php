<?php
if ($_POST) {
    $rg = $_POST['txtreg'];
    $con = mysqli_connect("localhost","root","","raghavan");
    if ($con)
        echo " Note: Successfully Connected.";
    $qry = "select * from result where regno=$rg";
    $result = mysqli_query($con, $qry);
    $nos = mysqli_num_rows($result);
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> Kongu Marksheet || Mini project</h1>
    <form method="POST" action="">
    <label for="txtreg">Regno:</label>
    <input type="text" id="txtreg" name="txtreg" />

    <label for="txtname">Name:</label>
    <input type="text" id="txtname" name="txtname" />

    <label for="txtmark">Mark:</label>
    <input type="text" id="txtmark" name="txtmark" />

    <label for="txtgrade">Grade:</label>
    <input type="text" id="txtgrade" name="txtgrade" />

    <input type="submit" value="Add New Data">
</form>
    <form method="POST" action="">
        <a>Regno:</a><input type="text" name="txtreg" />
        <input type="submit" value="Get Result">

    </form>
    <table>
    <thead>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Mark</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['regno'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['mark'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "</tr>";
        exit();
    }
    
    ?>
    <?php
if ($_POST) {
    $rg = $_POST['txtreg'];
    $name = $_POST['txtname'];
    $mark = $_POST['txtmark'];
    $grade = $_POST['txtgrade'];

    // Connect to MySQL database
    $con = mysqli_connect("localhost","root","","raghavan");
    if ($con) {
        // Insert the input values into the 'result' table
        $qry = "INSERT INTO result (regno, name, mark, grade) VALUES ('$rg', '$name', '$mark', '$grade')";
        $result = mysqli_query($con, $qry);
        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Failed to connect to database.";
    }
}
?></tbody>
</table>
</body>
</html>
