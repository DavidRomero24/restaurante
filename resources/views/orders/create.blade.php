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
						<div class="card-header" style="background-color: #733F2D; color:white;">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{route('orders.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<!-- SELECT CUSTOMER -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Customer <strong style="color: red;">(*)</strong></label>
											<select class="form-control" name="customer" id="customer">
												<option value>Select Customer</option>
												@foreach($customers as $customer)
												<option value="{{$customer->id}}">{{$customer -> name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<!-- DATE -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Date Order<strong style="color:red;">(*)</strong></label>
											<input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" autocomplete="off" value="{{$date}}">
										</div>
									</div>

									<!-- ORDER TABLE -->
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group">
											<table id="orderTable" class="table table-bordered table-hover" style="width:100%">
												<thead class="text-primary">
													<tr>
														<th>Product</th>
														<th>Amount</th>
														<th>Price</th>
														<th>Subtotal</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="orderTableBody">
													<tr>
														<td>
															<select class="form-control product-select">
																<option value>Select Product</option>
																@foreach($products as $product)
																<option value="{{$product->id}}" data-price="{{$product->price}}" data-amount="{{$product->amount}}">{{$product->name}}</option>
																@endforeach
															</select>
														</td>
														<td><input type="number" class="form-control amount" min="1" value="0"></td>
														<td><input type="text" class="form-control price" readonly></td>
														<td class="total">0.00</td>
														<td>
															<button type="button" class="btn btn-success btn-sm edit-product" title="Edit"><i class="fas fa-pencil-alt"></i></button>
															<button type="button" class="btn btn-danger btn-sm delete-product" title="Delete"><i class="fas fa-trash-alt"></i></button>
														</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<th colspan="3">Total</th>
														<th colspan="2" id="total-sum">0.00</th>
													</tr>
												</tfoot>
											</table>
											<button type="button" class="btn btn-sm" id="addProduct" style="background-color: #733F2D; color:white;">Add Product</button>
										</div>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<div class="row" style="justify-content: center;">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block btn-flat" style="background-color: #733F2D; color:white;">Register</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('orders.index') }}" class="btn btn-block btn-flat" style="background-color: #733F2D; color:white;">Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let sum = 0;

        function updateTotal() {
            const totals = document.querySelectorAll('.total');
            sum = 0;
            totals.forEach(total => {
                sum += parseFloat(total.textContent);
            });
            document.getElementById('total-sum').textContent = sum.toFixed(2);
        }

        function updateSubtotal(row) {
            const price = parseFloat(row.querySelector('.price').value);
            const amount = parseFloat(row.querySelector('.amount').value);
            const subtotal = price * amount;
            row.querySelector('.total').textContent = subtotal.toFixed(2);
        }

        function addProductRow() {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <select class="form-control product-select">
                        <option value>Select Product</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}" data-price="{{$product->price}}" data-amount="{{$product->amount}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" class="form-control amount" min="1" value="0"></td>
                <td><input type="text" class="form-control price" readonly></td>
                <td class="total">0.00</td>
                <td>
                    <button type="button" class="btn btn-success btn-sm edit-product" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-sm delete-product" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </td>
            `;
            document.getElementById('orderTableBody').appendChild(row);
            attachEventHandlers(row);
        }

        function attachEventHandlers(row) {
            row.querySelector('.product-select').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price'));
                const amount = parseFloat(selectedOption.getAttribute('data-amount'));
                const row = this.closest('tr');
                row.querySelector('.price').value = price.toFixed(2);
                row.querySelector('.amount').value = amount;
                updateSubtotal(row);
                updateTotal();
            });

            row.querySelector('.amount').addEventListener('input', function() {
                const row = this.closest('tr');
                updateSubtotal(row);
                updateTotal();
            });

            row.querySelector('.delete-product').addEventListener('click', function() {
                const row = this.closest('tr');
                row.remove();
                updateTotal();
            });

            row.querySelector('.edit-product').addEventListener('click', function() {
                const row = this.closest('tr');
                const amountInput = row.querySelector('.amount');
                amountInput.removeAttribute('readonly');
                amountInput.focus();
            });
        }

        document.getElementById('addProduct').addEventListener('click', function() {
            addProductRow();
        });

        // Attach event handlers to the initial row
        document.querySelectorAll('#orderTableBody tr').forEach(row => {
            attachEventHandlers(row);
        });

        updateTotal();
    });
</script>
<script>
    $('.delete-form').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro?',
            text: "Este registro se eliminara definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
@if(session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado',
        'El registro ha sido eliminado exitosamente',
        'success'
    )
</script>
@endif

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
        daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        format: "yyyy-mm-dd"
    };
    $('#date').datepicker({
        language: 'en'
    });
</script>
@endpush
