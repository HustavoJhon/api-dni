<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENIEC LOCAL</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        .btn-group {
            margin-top: 20px;
        }

        .input-group-text {
            width: 1000px;
        }

        #apellidoPaterno, #apellidoMaterno, #nombres {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">CONSULTATION BY DNI</h1>
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" for="documento">DNI:</span>
                    <input type="text" id="documento" class="form-control">
                    <button type="button" class="btn btn-primary" id="buscar">
                        Search
                    </button>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <input type="text" class="form-control" id="apellidoPaterno" disabled placeholder="Apellido Paterno">
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <input type="text" class="form-control" id="apellidoMaterno" disabled placeholder="Apellido Materno">
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <input type="text" class="form-control" id="nombres" disabled placeholder="Nombres">
            </div>
        </div>
    </div>
</body>

<script>
    $('#buscar').click(function () {
        var dni = $('#documento').val();
        $.ajax({
            url: "controller/consultas.php",
            type: "POST",
            cache: false,
            data: { dni: dni },
            dataType: "json",
            success: function (data) {
                if (data.numeroDocumento == dni) {
                    $("#apellidoPaterno").val(data.apellidoPaterno);
                    $("#apellidoMaterno").val(data.apellidoMaterno);
                    $("#nombres").val(data.nombres);
                } else {
                    toastr.error(data.e);
                }
            },
            error: function () {
                toastr.error("Hubo un error al realizar la llamada AJAX");
            }
        });
    });
</script>

</html>

