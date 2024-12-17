@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Produk</div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product) }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name', $product->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      name="description" 
                                      rows="3" 
                                      required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Paket Mingguan</label>
                            <input type="number" 
                                   class="form-control @error('price_weekly') is-invalid @enderror" 
                                   name="price_weekly" 
                                   value="{{ old('price_weekly', $product->price_weekly) }}" 
                                   required>
                            @error('price_weekly')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Paket Bulanan</label>
                            <input type="number" 
                                   class="form-control @error('price_monthly') is-invalid @enderror" 
                                   name="price_monthly" 
                                   value="{{ old('price_monthly', $product->price_monthly) }}" 
                                   required>
                            @error('price_monthly')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kalori</label>
                            <input type="number" 
                                   class="form-control @error('calories') is-invalid @enderror" 
                                   name="calories" 
                                   value="{{ old('calories', $product->calories) }}"