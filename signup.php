<!DOCTYPE html>
<html>
<head>
    <title>Manav Sipariş Sistemi - Üye Ol</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
        }

        .card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color:green;
            border-bottom: none;
            text-align: center;
            padding-top: 30px;
            padding-bottom: 20px;
            color: #fff;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .form-group label {
            color: #333;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: green;
            border-color: #007bff;
            border-radius: 10px;
            width: 100%;
        }

        .password-toggle-icon {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Manav Sipariş Sistemi - Üye Ol</h1>
            </div>
            <div class="card-body">
                <form action="register.php" method="POST" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Ad:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad:</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon No:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{11}" maxlength="11" value="05" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Kullanıcı Adı:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle-icon"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Üye Ol</button>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        document.querySelector('.password-toggle-icon').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var icon = document.querySelector('.password-toggle-icon i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
