@extends('dashboard')
@section('content')
<div class="container-fluid">  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Seni</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Seni</h6>
    </div>
    
    <div class="card-body">
        <form class="user" method="post" action="{{route('seni.store')}}" enctype="multipart/form-data">
        @csrf
            <h6 class="m-3 font-weight-bold text-basic">Nama seni</h6>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="name" placeholder="Nama Seni">
            </div>
            <h6 class="m-3 font-weight-bold text-basic">Deskripsi</h6>
            <div class="form-group">
                <textarea class="form-control form-control-user" name="description" placeholder="Deskripsi"></textarea>
            </div>
            <h6 class="m-3 font-weight-bold text-basic">Foto Destinasi</h6>
            <div class="form-group">
                <input type="file" class="form-control" name="thumbnail" placeholder="Nama Destinasi">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
        </form>
        <a href="{{ route('home')}}" class="btn btn-default btn-user btn-block">Batal</a>
        
    </div>
    </div>
</div>
@endsection