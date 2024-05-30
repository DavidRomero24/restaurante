@extends('layouts.app')

@section('title','List of customers')

@section('content')

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem; background-color: #A6774E; color:white;">
							@yield('title')

							<a href="{{ route('customers.create') }}" class="btn btn-light float-right" title="Create"><i class="fas fa-plus nav-icon" style="color: #A6774E;"></i></a>

						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Identification Document</th>
										<th>Address</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Image</th>
										<th>status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $customer)
									<tr>
										<td>{{ $customer -> id}}</td>
										<td>{{ $customer -> name}}</td>
										<td>{{ $customer -> identification_document}}</td>
										<td>{{ $customer -> address}}</td>
										<td>{{ $customer -> phone_number}}</td>
										<td>{{ $customer -> email}}</td>
										<td>
											@if ($customer->image != null)
											<center>
												<p><img class="img-responsive img-thumbnail" src="{{ asset('uploads/customers/' . $customer->image) }}" style="height: 70px; width: 70px;" alt=""></p>
											</center>
											@elseif ($customer->image == null)
											@endif
										</td>

										<td>
											<input data-id="{{$customer->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $customer->status ? 'checked' : '' }}>
										</td>

										<td>
											<a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fas fa-pencil-alt" style="justify-content: center;"></i></a>
											<form class="d-inline delete-form" action="{{ route('customers.destroy', $customer) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function() {
		$("example1").DataTable()
	});
	$(function() {
		$('.toggle-class').change(function() {
			var status = $(this).prop('checked') == true ? 1 : 0;
			var customer_id = $(this).data('id');
			$.ajax({
				type: "GET",
				dataType: "json",
				url: 'changestatuscustomer',
				data: {
					'status': status,
					'customer_id': customer_id
				},
				success: function(data) {
					console.log(data.success)
				}
			});
		})
	})
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
<script type="text/javascript">
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
			//"buttons": ["excel", "pdf", "print", "colvis"],
			"language": {
				"sLengthMenu": "Show MENU entries",
				"sEmptyTable": "No hay datos disponibles en la tabla",
				"sInfo": "Mostrando START a END de TOTAL entradas",
				"sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
				"sSearch": "Search:",
				"sZeroRecords": "No se encontraron registros coincidentes en la tabla",
				"sInfoFiltered": "(Filtrado de MAX entradas totales)",
				"oPaginate": {
					"sFirst": "First",
					"sPrevious": "Previous",
					"sNext": "Next",
					"sLast": "Last"
				},
				/*"buttons": {
					"print": "Imprimir",
					"colvis": "Visibilidad Columnas"
					/*"create": "Nuevo",
					"edit": "Cambiar",
					"remove": "Borrar",
					"copy": "Copiar",
					"csv": "fichero CSV",
					"excel": "tabla Excel",
					"pdf": "documento PDF",
					"collection": "Colección",
					"upload": "Seleccione fichero...."
				}*/
			}
		}); //.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	});
</script>
@endpush