<!DOCTYPE html>
<html>
<head>
    <title>Upload de Múltiplos Arquivos</title>
</head>
<body>

<h2>Envio de Múltiplos Arquivos</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivos[]" multiple>
    <br><br>
    <input type="submit" value="Enviar Arquivos" name="submit">
</form>

</body>
</html>
