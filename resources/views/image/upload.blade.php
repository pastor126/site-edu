<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eac266fb 0%, #fdb202 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #fdb202;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #eac266fb;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .link-show {
            text-align: center;
            margin-top: 20px;
        }

        .link-show a {
            color: #1f94e8;
            text-decoration: none;
            font-weight: bold;
        }

        .link-show a:hover {
            text-decoration: underline;
        }

        .info {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #004085;
            border: 1px solid #b8daff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📸 Upload de Imagem</h1>

        <div class="info">
            <form method="POST" action="{{ route('login.password') }}">
                @csrf
                <label>Digite sua senha</label>
                <input type="password" name="password" required>
            </form>
        

        @if(session('authorized'))
            </div>

            <div id="upload-area">
                <div class="info">
                    ℹ️ A nova imagem substituirá a imagem anterior
                </div>


                <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="image">Selecione a imagem (JPG apenas)</label>
                        <input type="file" id="image" name="image" accept=".jpg,.jpeg" required>
                    </div>

                    <button type="submit">Enviar Imagem</button>
                </form>
            </div>

        @endif
    <div class="link-show">
        <a href="{{ route('images.show') }}">Ver Imagem Atual →</a>
    </div>


    @if(session('role') === 'primary')

        <div class="info" style="margin-top:20px;">
            <h3>Alterar Senha Secundária</h3>

            <form method="POST" action="{{ route('update.secondary') }}">
                @csrf
                <input type="password" name="new_secondary_password" placeholder="Nova senha secundária" required>
                <button type="submit">Alterar Senha</button>
            </form>
        </div>

        </div>
        </div>
    @endif

</body>

</html>