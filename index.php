<!DOCTYPE html>
<html>

<head>
    <title>Manav Sipariş Sistemi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Manav Sipariş Sistemi</h1>
            </div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Kullanıcı Adı:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Giriş Yap</button>
                </form>
                <p class="text-center mt-3">Üye değil misin? <a href="signup.php">Üye Ol</a></p>
            </div>
        </div>
    </div>
</body>

</html>
