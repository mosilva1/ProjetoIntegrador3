<?php 
include "./db/conexao.php";

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']))
{
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $query = "select * from administrativo where email = '$email' and senha = '$senha'";
    $resultado = mysqli_query($conexao,$query);
    
    $qtd = $resultado->num_rows;

    if ($qtd == 1) {

        $usuario = $resultado->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id_administrativo'] = $usuario['id_administrativo'];
        $_SESSION['setor'] = $usuario['setor'];

        header("location:adm.php");

    }else{
        ?>
            <script>
                alert("Login Incorreto!");
            </script>
        <?php
    }
    
}


?>
<html lang="pt-BR">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="vHOGfEWfdsjVriNh5C4J6uqwZacs4Py7kEQFyIAH">

    <title>Faculdade de Tecnologia de Taquaritinga - Fatec Taquaritinga</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap">
    <link rel="icon" type="imagem/png" href="./img/logoFatec.svg" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">

    <!-- Scripts -->
    <script src="https://www.fatectq.edu.br/js/site.js" defer=""></script>
</head>
<body class="d-flex flex-column">

    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container justify-content-around">
        <a class="navbar-brand" href="/">
            <img src="img/logoFatec.svg" alt="Fatec Taquaritinga">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuTopo" aria-controls="menuTopo" aria-expanded="false" aria-label="Exibir links">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="menuTopo">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownCursos" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCursos">
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/agronegocio">Agronegócio</a>
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/analise-e-desenvolvimento-de-sistemas">Análise e Desenvolvimento de Sistemas</a>
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/gestao-empresarial">Gestão Empresarial (EaD)</a>
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/gestao-da-producao-industrial">Produção Industrial</a>
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/sistemas-para-internet">Sistemas para Internet</a>
                    <a class="dropdown-item" href="https://www.fatectq.edu.br/curso/gestao-da-producao-industrial">Pós-Graduação em Gestão da Produção Industrial</a>
                    
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownInst" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Institucional
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownInst">
                    <a class="dropdown-item" href="/sobre">Quem somos/departamentos</a>
                    
                    
                    <a class="dropdown-item" href="/grupos-de-pesquisa">Grupos de pesquisa</a>
                    
                    
                    <a class="dropdown-item" href="/noticias">Notícias/Imprensa</a>
                    
                    <a class="dropdown-item" href="/monitoria">Horários de monitoria</a>
                    <a class="dropdown-item" href="/calendario-letivo">Calendário letivo</a>
                    <a class="dropdown-item" href="/horario-das-aulas">Horário das aulas</a>
                    <a class="dropdown-item" href="/mapa-de-salas">Mapas de salas</a>
                    <a class="dropdown-item" href="/contato">Fale conosco</a>
                    <a class="dropdown-item" href="/regulamento-geral">Regulamento Geral</a>
                    <a class="dropdown-item" href="/identidade-visual">Identidade Visual</a>
                    <a class="dropdown-item" href="/documentacao-de-estagio">Documentação de Estágio</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownAcc" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acessos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownAcc">
                    <a class="dropdown-item" target="_blank" href="http://www.biblio.cps.sp.gov.br/">BiblioCPS</a>
                    <a class="dropdown-item" target="_blank" href="https://siga.cps.sp.gov.br/aluno/login.aspx">SIGA (para alunos)</a>
                    <a class="dropdown-item" target="_blank" href="https://siga.cps.sp.gov.br/fatec/login.aspx">SIGA (para professores)</a>
                    
                    <a class="dropdown-item" target="_blank" href="http://reserva.fatectq.edu.br/">Sistema de reservas (CLI/CLP)</a>
                    <a class="dropdown-item" target="_blank" href="http://mail.fatectq.edu.br/">E-mail (fatectq.edu.br)</a>
                    <a class="dropdown-item" target="_blank" href="http://mail.fatec.sp.gov.br/">E-mail (fatec.sp.gov.br)</a>
                    <a class="dropdown-item" target="_blank" href="http://revista.fatectq.edu.br/">Revista Interface Tecnológica</a>
                    <a class="dropdown-item" target="_blank" href="http://simtec.fatectq.edu.br/">Simpósio de Tecnologia (SIMTEC)</a>
                    <a class="dropdown-item" target="_blank" href="index.php">Requerimento On-line</a>   
                </div>
            </li>     
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownVest" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vestibular
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownAcc">
                    
                    <a class="dropdown-item" target="_blank" href="https://vestibularfatec.com.br">Inscrições</a>                        
                    <a class="dropdown-item" target="_blank" href="http://vestibularfatec.com.br/provas-gabaritos/">Provas antigas</a>
                </div>
            </li>  
            </ul>     
        </div>  
        <a class="navbar-brand-2 d-none d-md-block">
            <img src="img/logoCPS.svg" alt="CPS">
        </a>   
    </div>
    </nav>