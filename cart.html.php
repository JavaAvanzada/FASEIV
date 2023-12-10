<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style media="screen">
        .margin-custom{
          margin: 7px auto;
        }
        .form-control {          
            width: 40%;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-md-8 margin-custom">
            <h1></h1>
            <?php if(count($cart_items) > 0){ ?>
          </div>
      </div>
		 <div class="row">
     <div class="col-md-10 margin-custom">
       <table class="table table-bordered table-hover" border="1">
         <thead class="thead-dark">
           <tr>
             <th>Descripción</th>
             <th>Precio</th>
             <th>Quantity</th>
             <th>Total</th>
             
           </tr>
         </thead>
         <tbody id ="items-cart">
          <?php foreach ($cart_items as $key => $item): ?>
          <tr>
            <td><?php htmlout($item['Descripción']); ?></td>
            <td>
            	<span id="precio-<?php htmlout($item['cart_detail_id']); ?>"
            			data-id="<?php htmlout($item['cart_detail_id']); ?>"
            			data-precio="<?php echo number_format($item['precio'], 2); ?>"> 
            		$ <?php echo number_format($item['precio'], 2); ?>            	
            	</span> 
            </td>
            <td>
            	<input id="quantity-<?php htmlout($item['cart_detail_id']); ?>"
            		data-id="<?php htmlout($item['cart_detail_id']); ?>"
            		class="form-control" 
            		type="number"
            		name="quantity"
            		value="1"
            		min="1"
            		>
            </td>
            <td>
            	<span id="total-<?php htmlout($item['cart_detail_id']); ?>"
            		class="total"
            		data-id="<?php htmlout($item['cart_detail_id']); ?>"
            		data-total="<?php htmlout(1 * $item['precio']); ?>" >
            		$ <?php htmlout(1 * $item['precio']); ?>
            	</span>
            </td>
            <td>
              <form action="?" method="post">
                <p>
                  <input type="hidden" name="id" value="<?php htmlout($item['cart_detail_id']); ?>"/>
                  <button type="submit" class="btn btn-danger" value="Delete item" name="action">x</button>
                </p>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>

          <tfoot>
            <tr>
              <td>Total order:</td>
              <td> <span id="total-order" data-totalorder="0">$ 0</span> </td>
            </tr>
          </tfoot>
       </table>
     </div>
     <div class="col-md-8 margin-custom">
     <?php } else { ?>
        <p>Your cart is empty!</p>
     <?php } ?>

        <form action="?" method="post">
          <p>
            <a href="?">Continuar Comprando</a> or
            <input type="submit" name="action" class="btn btn-danger" value="Empty cart">
            or
            <input type="submit" name="action" class="btn btn-primary" value="Checkout">
          </p>
        </form>

     </div>

		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		window.onload = function() {
			calculeTotalOrder();
		}
		$('input[name="quantity"]').on('change', function(e){					
			calculeTotalItem(this);	
			calculeTotalOrder();
		});
 
		function calculeTotalItem(value) {
			let span_price = `span#precio-${$(value).data('id')}`;
			let span_total = `span#total-${$(value).data('id')}`;
			let element_phather = 'tr';
			let signo = '$';
			
			let quantity = $(value) ? $(value)[0].value : 0;
			let precio = $(value).closest(element_phather).find(span_price)[0].dataset.precio ?? 0;
		 		
			let total_str = `${signo} ${(quantity * precio).toFixed(2)}`;
			$(value).closest(element_phather).find(span_total)[0].dataset.total = (quantity * precio);
			$(value).closest(element_phather).find(span_total).text(total_str);		
		}

		function calculeTotalOrder() {
 			let totalSpans = $('#items-cart').find('span[id^="total"]');
 			if (totalSpans?.lenght == 0) {return;}
			let total_order = 0;
 	 	 	let signo = '$';
 			$(totalSpans).each(function(element){
				total_order += parseFloat($(this)[0].dataset.total);
 	 	 	}); 
			let total_str = `${signo} ${total_order.toFixed(2)}`;
			$('#total-order').text(total_str);
			if ($('#total-order')[0]) { $('#total-order')[0].dataset.totalorder = total_order; }
		}

		
		
		
	</script>
  </body>
</html>
