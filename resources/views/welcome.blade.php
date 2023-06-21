<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>::.. Vehiculos ..::</title>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    </head>
    <body>
         <!-- Contenido de la pagina html -->
         <form method="post" id="fromMarca">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="row p-1">
                        <div class="col-12">
                             Regristo de Vehiculos
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">Marca:</div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">
                            <input type="text" name="txtMarca" id="txtMarca" 
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">Modelo:</div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">
                            <input type="text" name="txtModelo" id="txtModelo" 
                            class="form-control" required>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">Año:</div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">
                            <input type="text" name="txtAño" id="txtAño" 
                            class="form-control" required>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">Numero de motor:</div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">
                            <input type="text" name="txtNumero de motor" id="txtNumero de motor" 
                            class="form-control" required>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">Numero de chasis:</div>
                    </div>
                    <div class="row p-1">
                        <div class="col-6 col-md-6">
                            <input type="text" name="txtNumero de chasis" id="txtNumero de chasis" 
                            class="form-control" required>
                        </div>
                    </div>
                   <div class="row p-1">
                        <div class="col-12 col-md-12">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                            <input type="reset" value="Nuevo" class="btn btn-warning">
                        </div>
                    </div>
                </div>



                <div class="col-6">
                    <table class="table table-sm" id="tblMarca">
                        <thead>
                            <tr>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>AÑO</th>
                                <th>NUMERO DE MOTOR</th>
                                <th>NUMERO DE CHASIS</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function listarVehiculos(){
            fetch('/vehiculos/listar', {
                method: 'GET',
            })
            .then(resp=>resp.json())
            .then(resp=>{
                let $tbl_vehiculos = document.querySelector('#tbl_vehiculos > tbody'),
                    filas = '';
                resp.forEach(vehiculo=>{
                    filas += `
                        <tr>
                            <td>${usuario.usuario}</td>
                            <td>${usuario.nombre}</td>
                        </tr>
                    `;
                });
                $tbl_vehiculos.innerHTML = filas;
            })
            .catch(err=>{
                console.log(err);
            });
        }
        document.addEventListener("DOMContentLoaded", event=>{
            listarVehiculos();
        });
        frmUsuario.addEventListener('submit', event=>{
            event.preventDefault();

            const data = {
                marca: txtMarca.value,
                modelo: txtModelo.value,
                año: txtAño.value
                
            };
            fetch('usuarios/guardar', {
                method: 'POST',
                body: JSON.stringify(data),
                headers:{
                    'Content-Type': 'application/json'
                }
            })
            .then(resp=>resp.json())
            .then(resp=>{
                listarVehiculos();
                console.log(resp);
            });                             
        });
    </script>
    </body>
</html>
