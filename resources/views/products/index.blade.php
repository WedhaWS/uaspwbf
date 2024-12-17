
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Daftar Produk Catering</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Kalori</th>
                                    <th>Harga Mingguan</th>
                                    <th>Harga Bulanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ Storage::url($product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->calories }} kal</td>
                                    <td>Rp {{ number_format($product->price_weekly, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($product->price_monthly, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge {{ $product->is_available ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" 
                                           class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data produk</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection