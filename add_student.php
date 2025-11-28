                                                                                                                                                                             <?php
// Step 1: Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = trim($_POST["student_id"]);
    $name = trim($_POST["name"]);
    $group = trim($_POST["group"]);

    // Step 2: Validation
    $errors = [];

    if (empty($student_id)  !ctype_digit($student_id)) {
        $errors[] = "Student ID is required and must be numbers only.";
    }

    if (empty($name)  !preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name is required and must contain letters only.";
    }

    if (empty($group)) {
        $errors[] = "Group is required.";
    }

    // If validation fails, show errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    // Step 3: Load existing students
    $students = [];
    if (file_exists("students.json")) {
        $jsonData = file_get_contents("students.json");
        $students = json_decode($jsonData, true);
    }

    // Step 4: Add new student to array
    $students[] = [
        "student_id" => $student_id,
        "name" => $name,
        "group" => $group
    ];

    // Step 5: Save updated list back to JSON file
    file_put_contents("students.json", json_encode($students, JSON_PRETTY_PRINT));

    // Step 6: Display confirmation
    echo "<h3 style='color:green;'>Student added successfully!</h3>";
    echo "<p><strong>ID:</strong> $student_id</p>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Group:</strong> $group</p>";
}
?>