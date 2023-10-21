@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
	<div class="row">
		<div class="col-md-4">
			<div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
			  <div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  </div>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="images/iphone1.jpg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="images/iphone1.jpg" class="d-block w-100" alt="...">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>
		</div>
		<div class="col-md-8 py-5">
			<h3>{{ $product->name }}</h3>
			<span class="badge bg-warning rounded-pill">New</span>
			<span class="badge bg-danger rounded-pill">Best Seller</span>
			<span class="badge bg-success rounded-pill">30%Off - Upto 20.1.2033</span>
			<span class="badge bg-info rounded-pill">5items in stock</span><br><br>

			<label class="fw-bold"> Price :</label> {{ $product->price }} MMK <br>
			<label class="fw-bold"> Discount Price :</label> {{ $product->price }} MMk <br><br>

			<label class="fw-bold">Descriptions</label>
			<p>{{ $product->description }}</p>
			<form>
			<div class="row">
			<div class="col-md-5">
				<label class="fw-bold mb-2">Available Color </label>
				<select class="form-control">
					<option>--- Choose ---</option>
					@foreach ($product as $category)
					<option>{{ $category->category }}</option>
                    @endforeach
				</select>
			</div>
			<div class="col-md-5">
				<label class="fw-bold mb-2">Available Memory</label>
				<select class="form-control">
					<option>--- Choose ---</option>
					@foreach ($qcs as $storage)
					<option>{{ $storage->storage }}</option>
                    @endforeach
				</select>
			</div>
			<div class="col-md-2">
				<label class="fw-bold mb-2">Quantity</label>
				<input type="number" class="form-control" value="1" >
			</div>
			</div>
			<button class="btn btn-primary mt-4">Add to Cart</button>
			</form>

		</div>
	</div>
	<h3 class="my-5 pt-5">Related Items</h3>
	<div class="row">
		<div class="col-sm-2">
			<div class="card mb-4 shadow-sm">
			  <img src="images/iphone1.jpg" class="card-img-top" alt="...">
			  <div class="card-body text-center bg-light">
			  	<span class="badge bg-warning rounded-pill">New</span>
				<span class="badge bg-success rounded-pill">30%Off</span>
				<span class="badge bg-danger rounded-pill">Best Seller</span>
			    <h6 class="card-title">i-phone 14Pro Max</h6>
			    <p class="card-text"><small>2,300,000 MMK</small></p>
			    <a href="detail.php" class="btn btn-primary btn-sm">Buy Item</a>
			  </div>
			</div>
		</div>

	</div>
</div>

<div class="border container-fluid py-5 text-center bg-light mt-5">
	<b>Copyright by Lobelia Students</b>
</div>
@endsection
