<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Listar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <br>
        <a class="btn btn-primary mt-5" href="caduser.php">Cadastrar</a>
        <?php
            if (isset($_SESSION['msg'])) {
                //pergunto se tem valor dentro da session
                echo $_SESSION['msg'];//exibe o conteudo da session
                unset($_SESSION['msg']);//mata a session
            }
            require './Conn.php';
            require './User.php';
            $list = new User();
            $result = $list->list();
        ?>
        <div class='h1 text-center'>Lista categorias</div>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nome_categoria</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($result as $row){
                                extract($row); 
                        ?>
                                <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $nome_categoria;?></td>
                                    
                                    <td>
                                        <a class="btn btn-success" href="view.php?id=<?php echo $id;?>">Visualizar</a>
                                        <a class="btn btn-info" href="edit.php?id=<?php echo $id;?>">Editar</a>
                                        <!-- <a class="btn btn-danger" href="delete.php?id=<?php //echo $id;?>">Excluir</a> -->
                                        <a class="btn btn-danger" href="#" onclick='confirmacaoExclusaoUser(<?php echo $id;?>);'>Excluir</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- chamar as funcoes JavaScript para deletar -->
    <script src="js/funcoes.js"></script>
</body>
</html>