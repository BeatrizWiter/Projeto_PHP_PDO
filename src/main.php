<?php
    require_once(__DIR__."/../vendor/autoload.php");
    
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use App\Model\Cantor;

    $nomedobanco = 'artistas';
    $servidordobancodedados = 'localhost';
    $usuario = 'root';
    $senha = '';

    $a = new Cantor();

    $logger = new Logger ("Aprendendo PDO");
    $logger->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::DEBUG));
    $logger->info("Meu primeiro log de verdade.");

    function get_connection(){
        $dns = "mysql:host=localhost;dbname=artistas;charset=utf8mb4";
        $conn = new \PDO($dns, "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    $c = get_connection();

    $query = "SELECT * FROM musicas";
    $statement = $c->prepare($query);
    $statement->execute();

    while ($dados = $statement->fetch(\PDO::FETCH_ASSOC)){
        echo $dados['id'].'<br>';
        echo $dados['nome'].'<br>';
    }


    
