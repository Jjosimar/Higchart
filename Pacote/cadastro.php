<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
        <form action="cadastrar.php" method="POST">
           <input style="display: none;" type="text" value="2" name="tipo" /> 
           Ano: <input type="text" name="ano">
           Valor:<input type="text" name="valor">
           Descrição:
           Linha:<input type="text" name="linha">
           <button type="submit">Enviar</button>
        </form>
    </body>
</html>