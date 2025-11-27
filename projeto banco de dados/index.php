<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>concessionária</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">X9 CAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Funcionários
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_funcionario">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_funcionario">Listar</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Clientes
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_cliente">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_cliente">Listar</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Marcas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_marca">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_marca">Listar</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Modelos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_modelo">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_modelo">Listar</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Vendas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_venda">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_venda">Listar</a></li>
                </ul>
                </li>   
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

    <div class="conteiner mt-3">
        <div class="row">
            <div class="col">
                <?php
                    include('config.php');

                    switch (@$_REQUEST['page']) {
                        case 'cadastrar_funcionario':
                            include('cadastrar_funcionario.php');
                            break;

                        case 'listar_funcionario':
                            include('listar_funcionario.php');
                            break;

                        case 'editar_funcionario':
                            include('editar_funcionario.php');
                            break;

                        case 'salvar_funcionario':
                            include('salvar_funcionario.php');
                            break;

                        case 'cadastrar_cliente':
                            include('cadastrar_cliente.php');
                            break;

                        case 'listar_cliente':
                            include('listar_cliente.php');
                            break;

                        case 'editar_cliente':
                            include('editar_cliente.php');
                            break;

                        case 'salvar_cliente':
                            include('salvar_cliente.php');
                            break;
                        
                            case 'cadastrar_marca':
                            include('cadastrar_marca.php');
                            break;

                        case 'listar_marca':
                            include('listar_marca.php');
                            break;

                        case 'editar_marca':
                            include('editar_marca.php');
                            break;

                        case 'salvar_marca':
                            include('salvar_marca.php');
                            break;
                        
                        case 'cadastrar_modelo':
                            include('cadastrar_modelo.php');
                            break;

                        case 'listar_modelo':
                            include('listar_modelo.php');
                            break;

                        case 'editar_modelo':
                            include('editar_modelo.php');
                            break;

                        case 'salvar_modelo':
                            include('salvar_modelo.php');
                            break;

                        case 'cadastrar_venda':
                            include('cadastrar_venda.php');
                            break;

                        case 'listar_venda':
                            include('listar_venda.php');
                            break;

                        case 'editar_venda':
                            include('editar_venda.php');
                            break;

                        case 'salvar_venda':
                            include('salvar_venda.php');
                            break;

                        

                        default:
                            print '<H1>Seja bem vindo ao sistema da X9 Car</H1>';
                            break;
                    }
                ?>
            </div>
        </div>
    </div>
        
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>