<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/5d98f52b89.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>@yield('title', 'Cadastro')</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="w-100 px-5 navbar navbar-expand-lg bg-light mb-5 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Econet</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto mr-5 gap-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/clientes">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pedidos">Pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        const [_, actualMenu] = new URL(window.location.href).pathname.split("/");
        if (actualMenu) {
            $(`a[href="/${actualMenu}"]`).addClass("text-primary border-bottom border-primary");
        }
    </script>

    @if (session('success'))
        <div class="alert alert-success w-75 p-3 mt-6 mx-auto rounded">{{ session('success') }}</div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger  w-75 p-3 mt-6 mx-auto rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
    </div>
    <script src="{{ asset('js/formValidate.js') }}"></script>


</body>

</html>
