
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</head>

<body>
<div class="container" style="padding-left: 10%; padding-top:20px;">
    <a class='btn btn-info' href="<?php echo constant('URL'); ?>consultacategoria"><i
            class="fa-solid fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
        Regresar</a>
</div>
        <section class="home-section">
        <div class="home-content">
            <div class="container mt-5" style="padding-left: 25%;">
                <div>
                    <?php echo $this->mensaje; ?>
                </div>
                <div class="row">
                    <h1 class="center">Actualizar
                        <?php echo $this->categoria->nombre; ?>
                    </h1>
                </div>
                <div class="row">
                    <form action="<?php echo constant('URL'); ?>consultacategoria/actualizarCategoria/" method="POST">
                        <div class="form-group">
                            <label for="id_categoria">ID</label>
                            <input type="text" class="form form-control" disabled name="id_categoria" id="id_categoria"
                                value="<?php echo $this->categoria->id_categoria; ?>" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form form-control" name="nombre"
                                value="<?php echo $this->categoria->nombre; ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="descripcion">Precio</label>
                            <input type="text" step="0.01" class="form form-control" name="descripcion" id="descripcion"
                                value="<?php echo $this->categoria->descripcion; ?>" required>
                        </div>
                        <br>
                        <div class="form form-group">
                            <input class="btn btn-primary" type="submit" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>