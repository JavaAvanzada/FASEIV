<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <title>Carrito de bolsa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style media="screen">
      .margin-custom{
        margin: 7px auto;
      }
    </style>
  </head>
  <body>
      <div class="container">
        <div class="row"  >
           <div class="col-md-8 margin-custom">
             <p > Estado del Carrito de bolsa <span></span> </p>
             <p > <a class="btn btn-primary" href="?cart">Ver su Carrito de bolsa.</a> </p>
           </div>
       </div>
          <div class="row"  >
            <div class="col-md-8 margin-custom">
            <table  class="table table-bordered table-hover" border="2">
              <thead class="thead-dark">
                <tr>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Estatus</th>
                </tr>
              </thead>
              <tbody>
                              
                  <tr>
                  
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="id" value="<?php  htmlout($item['id']) ?>">
                        <input type="submit" class="btn btn-primary" name="action" value="Add cart">
                      </form>
                    </td>
                  </tr>
                <?php  ?>
              </tbody>
            </table>
            </div>
          </div>
