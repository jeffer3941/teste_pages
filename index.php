<?php 
    $dsn = 'mysql:host=localhost;dbname=estudo_pdo';
    $usuario = 'root';
    $senha = '';


    if(is_numeric($_POST['idade']) && is_string($_POST['nome']) || !empty($_POST['idade'] || !empty($_POST['nome']))  ) {
        try {
            $conexao = new PDO($dsn, $usuario, $senha);    
            
            $query = "select * from usuarios where nome_usuario like('%{$_POST['nome']}%') and idade_usuario like({$_POST['idade']})";

            $stmt = $conexao->query($query);
            $lista = $stmt->fetch(PDO::FETCH_ASSOC);

            echo $lista['nome_usuario'];
            
        } catch (PDOException $e) {
            echo '<h1>';
            echo 'ATENCAO! CONTATE O SUPORTE:';
            echo '</h1>';
            echo '<p>'. $e->getMessage() . '</p>';
        
        }    
} else {
    echo "nenhum valor retornado insira um dado valido!!";
}
   // $conexao = new PDO('mysql:host=localhost;dbname=estudo_pdo', 'root', '');
?>

