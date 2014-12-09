<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Email de contato</title>
    <body>
      
      <div id="container">
          <p class="text-success">Mensagem Enviada dia: {{ $data }}</p>
          <p class="text-success">Mensagem Enviada por: {{ $email }}</p>
          <p>Mensagem: {{ $mensagem }}</p>
      </div>      

    </body>
</html>