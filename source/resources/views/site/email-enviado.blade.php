<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <header>

    </header>

    <main>
        <section class="container">
            <div class="d-flex justify-content-center" style="height:100vh;">
                <div class="m-auto" style="font-size:32px">
                    <p>Email adicionado para a fila com <strong class="text-success">sucesso</strong>.</p>
                    <a href="{{ route('index') }}" class="btn btn-secondary" style="font-size:16px">Clique aqui para voltar</a>
                   
                </div>
            </div>
        </section>
        
    </main>

    <footer>
       
    </footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>