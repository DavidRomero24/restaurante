@extends('layouts.app')

@section('title','Create Product')

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
						<div class="card-header " style="background-color: #A6774E; color:white;">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Example, plush" autocomplete="off" value="{{ old('name') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Description <strong style="color:red;">(*)</strong></label>
                                        	<div class="form-group label-floating">
                                        	    <div style="display:flex;">
											        <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
                                        	    </div>
											</div>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Amount <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="amount" placeholder="0" autocomplete="off" value="{{ old('amount') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Price<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price" placeholder="Price" autocomplete="off" value="{{ old('price') }}">
										</div>
                                        <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image" >
                                            </div>
                                        </div>
								</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block btn-flat" style="background-color: #A6774E; color:white;">Create</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}" class="btn btn-block btn-flat" style="background-color: #A6774E; color:white;">Back</a>
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