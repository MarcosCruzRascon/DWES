<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="MiForm" id="MiForm" method="post" action="cargar.php" enctype="multipart/form-data">
        <h4 class="text-center">Seleccione imagen a cargar</h4>
        <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" name="image" multiple>
            </div>
            <button name="submit" class="btn btn-primary">Cargar Imagen</button>
        </div>
    </form>
</body>

</html>