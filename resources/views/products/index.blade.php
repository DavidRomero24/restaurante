@extends('layouts.app')

@section('title','list of products')

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
						<div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
							
								<a href="{{ route('products.create') }}" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
							
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
									<tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>expiration date</th>
                                        <th>amount</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
                                        <td>{{ $product -> id}}</td>
                                        <td>{{ $product -> name}}</td>
                                        <td>{{ $product -> description}}</td>
										<td>
											@if ($product->image != null)
												<center>
													<p><img class="img-responsive img-thumbnail"
														src="{{ asset('uploads/products/' . $product->image) }}" 
														style="height: 70px; width: 70px;" alt=""></p>
												</center>
											@elseif ($product->image == null)
											@endif
										</td>
                                        <td>{{ $product -> price}}</td>
                                        <td>{{ $product -> expiration_date}}</td>
                                        <td>{{ $product -> amount}}</td>
										
										
										<td>
										
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-info btn-sm bg-white mb-1 border-2 border-success" tittle="Edit" ><i class="fas fa-pencil-alt"></i></a>
										
                                        <form class="d-inline delete-form" action="{{route('products.destroy', $product)}}" method="$_POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm border-2 bg-white" title="Delete"><i class="fas fa-trash-alt" ></i></button>
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
		$(document).ready(function(){
			$("example1").DataTable()
		});
		$(function() {
			$('.toggle-class').change(function() {
				var estado = $(this).prop('checked') == true ? 1 : 0;
				var arl_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'cambioestadoarl',
					data: {'estado': estado, 'arl_id': arl_id},
					success: function(data){
					  console.log(data.success)
					}
				});
			})
		  })
	</script>
	<script>
	$('.delete-form').submit(function(e){
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
		$(function () {
			$("#example1").DataTable({
				"responsive": true, 
				"lengthChange": true, 
				"autoWidth": false,
				//"buttons": ["excel", "pdf", "print", "colvis"],
				"language": 
						{
							"sLengthMenu": "Mostrar MENU entradas",
							"sEmptyTable": "No hay datos disponibles en la tabla",
							"sInfo": "Mostrando START a END de TOTAL entradas",
							"sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
							"sSearch": "Buscar:",
							"sZeroRecords": "No se encontraron registros coincidentes en la tabla",
							"sInfoFiltered": "(Filtrado de MAX entradas totales)",
							"oPaginate": {
								"sFirst": "Primero",
								"sPrevious": "Anterior",
								"sNext": "Siguiente",
								"sLast": "Ultimo"
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
			});//.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
	</script>
@endpush