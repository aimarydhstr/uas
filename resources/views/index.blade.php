@extends('layouts.app')
@extends('layouts.alert')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 p-5 shadow">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 style="font-size: 20px">Data Barang</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="table" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col" class="text-center">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $data)
                            <tr valign="middle">
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $data->kode_barang }}</td>
                                <td class="text-center"><img width="50" height="50" class="rounded" src="{{ asset('/images/'.$data->gambar) }}" alt="{{ $data->nama }}"></td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->harga_beli }}</td>
                                <td>{{ $data->harga_jual }}</td>
                                <td>{{ $data->stok }}</td>
                                <td class="d-flex justify-content-center py-3">
                                    <button type="button" class="btn btn-success btn-sm me-2" style="max-height:31.5px; height:31.5px" data-bs-toggle="modal" data-bs-target="#myModal{{ $data->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('barang.delete', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" style="max-height:31.5px; height:31.5px" type="submit">Delete</button>
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

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('barang.add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group my-3">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" required name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}">
                @error('kode_barang')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" required name="nama" id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>  
            <div class="form-group my-3">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" class="form-control" required name="harga_beli" id="harga_beli" value="{{ old('harga_beli') }}">
                @error('harga_beli')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" class="form-control" required name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}">
                @error('harga_jual')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" value="{{ old('gambar') }}">
                @error('gambar')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="stok">Stok Barang</label>
                <input type="number" class="form-control" required name="stok" id="stok" value="{{ old('stok') }}">
                @error('stok')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="kategori">Kategori Barang</label>
                <input type="text" class="form-control" required name="kategori" id="kategori" value="{{ old('kategori') }}">
                @error('kategori')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($barang as $data)
<div class="modal" id="myModal{{ $data->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('barang.edit', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
        <div class="form-group my-3">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" readonly class="form-control my-3" required name="kode_barang" id="kode_barang" value="{{ $data->kode_barang }}">
                @error('kode_barang')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control my-3" required name="nama" id="nama" value="{{ $data->nama }}">
                @error('nama')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>  
            <div class="form-group my-3">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" class="form-control my-3" required name="harga_beli" id="harga_beli" value="{{ $data->harga_beli }}">
                @error('harga_beli')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" class="form-control my-3" required name="harga_jual" id="harga_jual" value="{{ $data->harga_jual }}">
                @error('harga_jual')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3 d-flex">
                <img width="150" height="150" class="rounded border me-3" src="{{ asset('/images/'.$data->gambar) }}" alt="{{ $data->nama }}">
                <div>
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control my-3" name="gambar" id="gambar" value="{{ $data->gambar }}">
                    @error('gambar')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group my-3">
                <label for="stok">Stok Barang</label>
                <input type="number" class="form-control my-3" required name="stok" id="stok" value="{{ $data->stok }}">
                @error('stok')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="kategori">Kategori Barang</label>
                <input type="text" class="form-control my-3" required name="kategori" id="kategori" value="{{ $data->kategori }}">
                @error('kategori')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    });
</script>
@endsection