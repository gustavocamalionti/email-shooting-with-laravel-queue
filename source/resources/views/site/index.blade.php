<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>Document</title>
    
</head>
<body>
    <header>
    </header>
    <main style="margin-top: 100px">
        <div class="container">
            <div class="row pb-3" style="border-bottom:3px solid black">
                <div class="d-flex justify-content-center" style="">
                    <div class="m-auto" style="font-size:32px;">
                        <p>Para enviar um e-mail, <a href="{{ route('send.email') }}" class="btn btn-success" style="font-size:26px">Clique aqui!</a></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h4 class="pt-3" >Listagem de Envios</h4>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center align-middle">UUID</th>
                            <th scope="col" class="text-center align-middle">Email</th>
                            <th scope="col" class="text-center align-middle">Data de Criação</th>
                            <th scope="col" class="text-center align-middle">Data de Atualização</th>
                            <th scope="col" class="text-center align-middle">Detalhes</th>
                            <th scope="col" class="text-center align-middle">Status</th>
                            <th scope="col" class="text-center align-middle">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event_list as $value )
                            <tr>
                                <th scope="row">{{ $value->uuid }}</th>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>{{ $value->details }}</td>
                                <td class="text-center align-middle">
                                    <span class="d=block badge bg-{{ $value->status == 'Success' ? 'success' : ($value->status == 'Processing' ? 'warning': 'danger') }}" style="font-size:14px">{{ $value->status }}</span>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="#" class="{{ $value->status == 'Success' ? 'fas fa-envelope' : ($value->status == 'Processing' ? 'fas fa-circle-notch fa-spin': 'fas fa-sync-alt') }}" aria-hidden="true" style="font-size:22px; text-decoration: none; color:inherit;"></a>           
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>