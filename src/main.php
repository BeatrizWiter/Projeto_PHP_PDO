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

    $logger = new Logger("Aprendendo PDO");
    $logger->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::DEBUG));
    $logger->info("Meu primeiro log de verdade.");

    function get_connection(){
        $dns = "mysql:host=localhost;dbname=artistas;charset=utf8mb4";
        $conn = new \PDO($dns, "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    $c = get_connection();

    $query = "SELECT id, nome_musica, nome_cantor FROM musicas";
    $statement = $c->prepare($query);
    $statement->execute();

    $resultados = $statement->fetchAll(\PDO::FETCH_ASSOC);

?>


<table>
    <thead>
        <tr>
            <th style="background-color: gray; width:200px"> ID </th>
            <th style="background-color: gray; width:200px">Nome Música</th>
            <th style="background-color: gray; width:200px">Cantor</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($resultados as $dados): ?>
            <tr>
                <td style="text-align:center"><?php echo $dados['id']; ?></td>
                <td style="text-align:center"><?php echo $dados['nome_musica']; ?></td>
                <td style="text-align:center"><?php echo $dados['nome_cantor']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    


    
