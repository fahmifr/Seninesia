@extends('dashboard')
@section('content')
<div class="container-fluid">  
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Seni</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Seni</h6>
    </div>
    
    <div class="card-body">
        <form class="user" method="post" action="{{ route('seni.update', $seni->id)}}" enctype="multipart/form-data">
        @csrf
        @method('post')
            <h6 class="m-3 font-weight-bold text-basic">Nama seni</h6>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="name" value="{{ $seni->name }}">
            </div>
            <h6 class="m-3 font-weight-bold text-basic">Deskripsi</h6>
            <div class="form-group">
                <textarea class="form-control form-control-user" name="description"value="{{ $seni->description}}"></textarea>
            </div>
            <h6 class="m-3 font-weight-bold text-basic">Foto Seni</h6>
            <div class="text-center">
                <img src="{{ asset('assets/img/seni/' . $seni->thumbnail)}}" alt="" style="width:800px;">
                <h6 class="m-3 font-weight-bold text-basic">{{ $seni->thumbnail }}</h6>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="thumbnail">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
        </form>
        <a href="{{ route('home')}}" class="btn btn-default btn-user btn-block">Batal</a>
    </div>
    </div>
</div>
@endsection