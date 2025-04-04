<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Student Management</a>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1>Welcome to Student Management System</h1>
        <a href="/students" class="btn btn-primary">Go to Dashboard</a>
    </div>

    <footer class="text-center mt-5 py-3 bg-light">
        <p>© 2025 Student Management System</p>
    </footer>
</body>
</html>
