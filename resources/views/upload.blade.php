<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>
    <h1>Import Products</h1>
    <form action="/import-products" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
