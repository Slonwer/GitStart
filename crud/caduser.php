<?php
    session_start();//inicializando a session/sessao
    ob_start();//limpa os ultimos registro da session
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedro-Cadastrar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <a class="btn btn-primary mt-5" href="index.php">Listar</a>
        <br><br>
        <div class="h1 text-center">Cadastrar categorias</div>
        <form action="" method="post">
            <!-- categorias -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nome</span>
                </div>
                <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" placeholder="nome_categoria" aria-label="nome_categoria" aria-describedby="basic-addon1" require>
            </div>

           
          
            <input type="submit" class="btn btn-primary" value="Salvar" name="salvar">
        </form>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
    /* Código para Cadastrar */
    require './Conn.php';
    require './User.php';
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['salvar'])) {
        //var_dump($formData);
        $insertUser = new User();
        $insertUser->formData = $formData;
        $valor = $insertUser->insert();

        if ($valor) {
            $_SESSION['msg'] = "<p style='color:green'>Registro cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red'>Ocorreu Erro!</p>";
        }
    }
?>