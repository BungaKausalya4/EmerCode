<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role User</title>
    <link rel="stylesheet" href="chooseuser.css">
</head>
<body>
    <div class="container">
        <h1>Pilih Role Anda</h1>
        <div class="role-selection">
            <a href="{{ url('login') }}" class="role-button">
                <img src="image/1.png" alt="Paramedis"> Paramedis
            </a>
            <a href="{{ url('login') }}" class="role-button">
                <img src="image/2.png" alt="Admin Rumah Sakit"> Admin Rumah Sakit
            </a>
            
        </div>
    </div>
</body>
</html>