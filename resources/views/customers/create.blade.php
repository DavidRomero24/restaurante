@extends('layouts.app')

@section('title','Create Customer')

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
						<div class="card-header" style="background-color: #A6774E; color:white;">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{route('customers.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Example, Pedro Perez" autocomplete="off" value="{{ old('name') }}" required>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Identification Document <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="identification_document" placeholder="Enter your number identification" autocomplete="off" value="{{ old('identification_document') }}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Address <strong style="color:red;">(*)</strong></label>
                                        	<div class="form-group label-floating">
                                        	    <div style="display:flex;">
											        <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"></textarea>
                                        	    </div>
											</div>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Phone Number <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="phone_number" placeholder="Enter your phone number" autocomplete="off" value="{{ old('phone_number') }}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Email<strong style="color:red;">(*)</strong></label>
											<input type="email" class="form-control" name="email" placeholder="email@example.com" autocomplete="off" value="{{ old('email') }}" required>
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
										<a href="{{ route('customers.index') }}" class="btn btn-block btn-flat" style="background-color: #A6774E; color:white;">Back</a>
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