<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Library</h1>

<h2>Add Student</h2>
<form action="Admin.php" method="post">
    <input type="hidden" name="action" value="addStudent">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>
    <label for="nationalCode">National Code:</label>
    <input type="text" id="nationalCode" name="nationalCode" required>
    <button type="submit">Add Student</button>
</form>

<h2>Add Book</h2>
<form action="Admin.php" method="post">
    <input type="hidden" name="action" value="addBook">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
    <label for="publicationYear">Publication Year:</label>
    <input type="text" id="publicationYear" name="publicationYear" required>
    <label for="totalCopies">Total Copies:</label>
    <input type="text" id="totalCopies" name="totalCopies" required>
    <button type="submit">Add Book</button>
</form>

<h2>Request Book</h2>
<form action="Student.php" method="post">
    <label for="studentNationalCode">Student National Code:</label>
    <input type="text" id="studentNationalCode" name="studentNationalCode" required>
    <label for="bookTitle">Book Title:</label>
    <input type="text" id="bookTitle" name="bookTitle" required>
    <button type="submit">Request Book</button>
</form>
</body>
</html>