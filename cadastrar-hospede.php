<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Hospede</title>
</head>

<body>
    
    <h1>Cadatrar Hospede</h1>

    <div class="form_cadastrar_hospede">
        <form method="post" action="server/cadastrar-hospede-submit.php">
            Nome Completo:<br>
            <input type="text" id="nome_completo" name="nome_completo" required/><br><br>
            CPF:<br>
            <input type="text" id="CPF" name="CPF" required/><br><br>
            Email:<br>
            <input type="email" id="email" name="email" required/><br><br>
            Celular:<br>
            <input type="tel" id="celular" name="celular" required/><br><br>

            <input type="submit" value="Enviar"/>
        </form>
    </div>









<script src="js/script.js"></script>
</body>
</html>