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
                    <p>Para enviar um e-mail, <a href="{{ route('send.email') }}" class="btn btn-success" style="font-size:32px">Clique aqui!</a></p>
                </div>
            </div>
        </section>
        
    </main>

    <footer>

    </footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>