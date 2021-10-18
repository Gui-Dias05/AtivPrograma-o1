<!DOCTYPE html>

<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Carro";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $input = isset($_POST["input"]) ? $_POST["input"] : "";
   $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
   $valor = isset($_POST["valor"]) ? $_POST["valor"] : "";
   $km = isset($_POST["km"]) ? $_POST["km"] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="teste.css" /> 
</head>
<body>
<?php include "menu1.php"; ?>
<form method="post">
  <div>

    <p>Selecione o que quer pesquisar</p>

    <input type="radio" id="consulta1"<?php if($input == "consulta1"){echo "checked";}?>
     name="input" value="consulta1">
    <label for="consulta1">Nome</label>

    <input type="radio" id="consulta2"<?php if($input == "consulta2"){echo "checked";}?>
     name="input" value="consulta2">
    <label for="consulta2">Valor</label>

    <input type="radio" id="consulta3"<?php if($input == "consulta3"){echo "checked";}?>
     name="input" value="consulta3">
    <label for="consulta3">KM</label>
  </div>

    <fieldset>
        <legend>Carro</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
	    <tr><td><b>id</b></td><td><b>nome</b></td> <td><b>valor</b></td><td><b>km</b></td><td><b>dataFabricacao</b></td><td><b>Anos de uso</b></td><td><b>Média km por ano</b></td> <td><b>Valor revenda com desconto</b></td></tr>
        
    <?php
            $pdo = Conexao::getInstance(); 
            if($input==""){
                $consulta = $pdo->query("SELECT * FROM carro 
                WHERE nome LIKE '$procurar%' 
                ORDER BY nome");
                }

            else if($input=="consulta1"){
                $consulta = $pdo->query("SELECT * FROM carro 
                                     WHERE nome LIKE '$procurar%' 
                                     ORDER BY nome");
                                    }
            else if($input=="consulta2"){
                $consulta = $pdo->query("SELECT * FROM carro 
                                      WHERE valor <= '$procurar%' 
                                      ORDER BY valor");
                                    }
            else if($input=="consulta3"){
                $consulta = $pdo->query("SELECT * FROM carro 
                                       WHERE km <= '$procurar%' 
                                       ORDER BY km");
                                    }
   

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 

            $ano = date("Y")-date("Y", strtotime($linha['dataFabricacao']));

            $hoje=date("Y");
            $fab=date("Y", strtotime($linha["dataFabricacao"]));
            $anos=$hoje-$fab;
            $media=$linha['km']/$anos;
            
            if($linha['km']>=100000 && $ano<10){
                echo $linha['km'];
                $valor1=$linha['valor']*0.10;
                $valorfinal=$linha['valor']-$valor1;
                $cor="red";
            }elseif($linha['km']<100000 && $ano>=10){
                echo $linha['km'];
                $valor1=$linha['valor']*0.10;
                $valorfinal=$linha['valor']-$valor1;
                $cor="red";
            }elseif($linha['km']>=100000 && $ano>=10){
                $valor1=$linha['valor']*0.20;
                $valorfinal=$linha['valor']-$valor1;
                $cor="red";
            }else{
                $valorfinal=$linha['valor'];
                $cor="black";
            }

        ?>

        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['valor'];?></td>
            <td><?php echo $linha['km'];?></td>
            <td><?php echo $ano?></td>
            <td><?php echo $hoje-$fab; ?></td>
            <td><?php echo number_format ($media, 2, ",", ".");?></td>
            <td style="color:<?php echo $cor;?>"><?php echo $valorfinal; ?></td>
     

        </tr>
              <?php } ?>   
        </table>
    </fieldset>
    </form>
</body>
</html>