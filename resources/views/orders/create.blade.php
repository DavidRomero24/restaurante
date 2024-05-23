@extends('layouts.app')

@section('title','Create Order')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header " style="background-color: #A6774E;">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<!-- SELECT CUSTOMER -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Customer <strong style="color: red;">(*)</strong></label>
											<select class="form-control select2" style="width: 100%;" name="customer" id="customer">
												<option value>Select Customer</option>
												@foreach($customers as $customer)
													<option value="{{ $customer->id }}">{{ $customer->name }}</option>
												@endforeach
											</select>
										</div>										
									</div>
									<!-- DATE -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Date Order<strong style="color:red;">(*)</strong></label>
											<input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" autocomplete="off" value="{{ $date }}">
										</div>
									</div>

									<!-- SELECT PRODUCTS TABLE -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									   <div class="card">
									       <div class="card-header" style="background-color: #A6774E;">
									           <h3>Order Detail</h3>
									       </div>
									       <div class="card-body">
									           <div class="row">
									               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Product <strong style="color:red;">(*)</strong></label>
									                       <select class="form-control select2" style="width: 100%;" name="product" id="product">
									                           <option value>Select Product</option>
									                           @foreach($products as $product)
									                               <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
									                           @endforeach
									                       </select>
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Amount <strong style="color:red;">(*)</strong></label>
									                       <input type="number" class="form-control" name="amount" id="amount" value="0">
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Price <strong style="color:red;">(*)</strong></label>
									                       <input type="number" class="form-control" name="price" id="price">
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Subtotal</label>
									                       <input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
									                   </div>
									               </div>
									               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mt-4">
									                   <button type="button" style="background-color: #A6774E;" class="btn btn-block" id="add_producto">Add</button>
									               </div>
									           </div>
									       </div>
									   </div>
									</div>

									<!-- Tabla para mostrar los detalles del pedido -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
									    <div class="card">
									        <div class="card-body">
									            <table class="table table-bordered" id="order_details_table">
									                <thead>
									                    <tr>
									                        <th>Product</th>
									                        <th>Amount</th>
									                        <th>Price</th>
									                        <th>Subtotal</th>
									                        <th>Action</th>
									                    </tr>
									                </thead>
									                <tbody>
									                    <!-- Aquí se mostrarán las filas dinámicas -->
									                </tbody>
													<tfoot>
                									    <tr>
                									        <th colspan="3">Total:</th>
                									        <th id="total" colspan="2">0.00</th>
                									    </tr>
                									</tfoot>
									            </table>
									        </div>
									    </div>
									</div>

									<!-- Botón Registrar -->
									<div class="col-lg-2 col-xs-4" style="margin: auto;">
									    <button type="submit" class="btn btn-block "  id="register_button" style="display: none; background-color: #A6774E;">Save</button>
									</div>
								</div>
								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="resgisterby" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('orders.index') }}" class="btn btn-block btn-flat" style="background-color: #A6774E;">Back</a>
									</div>
								</div>
							</div>
							<input type="hidden" name="orderDetails" id="orderDetails">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@push('scripts')
<!-- SCRIPT TO SELECT CLIENT -->
<script type="text/javascript">
	$("#customer").select2({
		allowClear: true
	});
</script>

<!-- SCRIPT TO LOCAL DATE -->
<script type="text/javascript">
	$.fn.datepicker.dates['en'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		format: "yyyy-mm-dd"
	};
	$('#date').datepicker({
		language: 'en'
	});
</script>

<!-- SCRIPT TO SELECT PRODUCT -->
<script type="text/javascript">
	$("#product").select2({
		allowClear: true
	});
</script>

<script type="text/javascript">
    // Función para calcular el subtotal
    function calculateSubtotal(amount, price) {
        return amount * price;
    }

    $(document).ready(function () {
        // Calcular subtotal al cambiar la cantidad o el precio
        $("#amount, #price").on('input', function () {
            var amount = parseInt($("#amount").val());
            var price = parseFloat($("#price").val());
            var subtotal = calculateSubtotal(amount, price);
            $("#subtotal").val(subtotal.toFixed(2));
        });

        // Actualizar precio unitario al cambiar la selección de producto
        $("#product").change(function () {
            var selectedProductId = $(this).val();
            var selectedProductPrice = $(this).find('option:selected').data('price');
            $("#price").val(selectedProductPrice);
        });

        // Arreglo para almacenar los detalles del pedido
        var orderDetails = [];

        // Función para agregar una fila a la tabla
        function addRowToTable(productId, productName, amount, price, subtotal) {
            var row = "<tr>" +
                        "<td data-product-id='"+productId+"'>" + productName + "</td>" +
                        "<td>" + amount + "</td>" +
                        "<td>" + price + "</td>" +
                        "<td>" + subtotal.toFixed(2) + "</td>" +
                        "<td><button type='button' class='btn btn-danger remove_detail'>Delete</button></td>" +
                      "</tr>";
            $("#order_details_table tbody").append(row);
        }

        // Función para actualizar el total
        function updateTotal() {
            var total = orderDetails.reduce((sum, detail) => sum + detail.subtotal, 0);
            $("#total").text(total.toFixed(2));
        }

        // Función para verificar si hay detalles y mostrar el botón de registro
        function toggleRegisterButton() {
            if (orderDetails.length > 0) {
                $("#register_button").show();
            } else {
                $("#register_button").hide();
            }
        }

        // Manejar el evento de agregar producto
        $("#add_producto").click(function () {
            var productId = $("#product").val();
            var productName = $("#product option:selected").text();
            var amount = parseInt($("#amount").val());
            var price = parseFloat($("#price").val());
            var subtotal = calculateSubtotal(amount, price);

			// Verificar si se han seleccionado todos los campos
            if (!productId || amount <= 0 || !price) {
                alert("Please add the product, amount, and price!");
                return;
            }

            var subtotal = calculateSubtotal(amount, price);

            // Agregar el detalle al arreglo
            orderDetails.push({ productId, productName, amount, price, subtotal });

            // Agregar la fila a la tabla
            addRowToTable(productId, productName, amount, price, subtotal);

            // Actualizar el total
            updateTotal();

            // Limpiar los campos del formulario
            $("#product").val(null).trigger('change');
            $("#amount").val(0);
            $("#price").val('');
            $("#subtotal").val('');

            // Mostrar el botón de registro si hay detalles
            toggleRegisterButton();
        });

        // Manejar el evento de eliminar detalle
        $(document).on('click', '.remove_detail', function () {
            var rowIndex = $(this).closest('tr').index();
            orderDetails.splice(rowIndex, 1);
            $(this).closest('tr').remove();

            // Actualizar el total
            updateTotal();

            // Mostrar u ocultar el botón de registro según los detalles
            toggleRegisterButton();
        });
    });
</script>

<!-- JavaScript para gestionar el envío de datos -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#register_button").click(function(e) {
            e.preventDefault();
            
            var orderDetails = [];
            $("#order_details_table tbody tr").each(function() {
                var row = $(this);
                var productId = row.find("td:eq(0)").data("product-id");
                var amount = row.find("td:eq(1)").text();
                var price = row.find("td:eq(2)").text();
                var subtotal = row.find("td:eq(3)").text();
                
                orderDetails.push({
                    product_id: productId,
                    amount: parseInt(amount),
                    price: parseFloat(price),
                    subtotal: parseFloat(subtotal)
                });
            });

            $("#orderDetails").val(JSON.stringify(orderDetails));
            $("form").submit();
        });
    });
</script>
@endpush
