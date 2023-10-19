@extends('admin.layouts.app')

@section('content')
<h3 class="text-center mt-2 mb-4">Add Quantity, Colors</h3>
<form method="POST" action="{{ route('add.qcs') }}">
    @csrf
    <div class="row">
            <label class="fw-bold mb-2">Product</label>
            <select class="form-control" name="product_id">
                <option>-- Choose ---</option>
                @foreach ($products as $product)

                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>

            <label class="fw-bold mb-2">Available Color</label>
            <select class="form-control" name="color_id">
                <option>-- Choose ---</option>
                @foreach ($colors as $color)

                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                @endforeach
            </select>

            <label class="fw-bold mb-2">Available Storage</label>
            <select class="form-control" name="storage">
                <option>-- Choose ---</option>
                <option value="64">64gb</option>
                <option value="128">128gb</option>
                <option value="256">256gb</option>
                <option value="512">512gb</option>
            </select>
            <input type="number" name="quantity" class="form-control my-2" placeholder="Enter Quantity">
    </div>
    <button class="btn btn-primary mt-2">Publish</button>
</form>
@endsection
