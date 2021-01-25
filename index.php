<?php 
    const DSN = 'mysql:host=localhost;dbname=estudo_pdo';
    const USUARIO  = 'root';
    const SENHA = '';


    if( is_string($_POST['nome'])  ) {
        try {
            $conexao = new PDO(DSN,USUARIO, SENHA );    
            
            
            $query = "select * from usuarios where nome_usuario like(:nome) and idade_usuario = :idade";
           
            $stmt = $conexao->prepare($query);
            echo $_POST['idade'];
            $stmt->bindValue(':nome' , $_POST['nome']);
            $stmt->bindValue(':idade' , $_POST['idade'], PDO::PARAM_INT);
            
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<pre>';
            print_r($resultado);
            echo '</pre>';

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

