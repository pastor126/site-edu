<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Imagem</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .header h1 {
            margin-bottom: 15px;
        }
        .header a {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
        .header a:hover {
            background: rgba(255,255,255,0.3);
        }
        .image-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .empty-state h2 {
            color: #666;
            margin-bottom: 15px;
        }
        .empty-state p {
            color: #888;
            margin-bottom: 20px;
        }
        .empty-state a {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .empty-state a:hover {
            background: #5568d3;
        }
    </style>
</head>
<body>

    @if($imageExists)
        <div class="image-container">
            <img src="{{ asset('storage/current-image.jpg') }}?v={{ time() }}" alt="Imagem atual">
        </div>
    @else
        <div class="empty-state">
            <h2>📭 Nenhuma imagem disponível</h2>
            <p>Ainda não foi feito upload de nenhuma imagem.</p>
            <a href="{{ route('images.upload') }}">Fazer upload da primeira imagem</a>
        </div>
    @endif
</body>
</html>