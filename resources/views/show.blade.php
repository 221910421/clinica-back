<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"> Medicamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicamentos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $medicamento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $medicamento->clasificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Inicio:</strong>
                            {{ $medicamento->presentacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha De Termino:</strong>
                            {{ $medicamento->dosis }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>