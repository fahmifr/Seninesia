@extends('dashboard')
@section('content')
<div class="container-fluid">  
    <!-- Page Heading -->
    <h1 style="text-align:center">List Seni</h1>
        <div class="text-right">
        <a href="{{ route('seni.create')}}" class="btn btn-sm btn-primary">Tambah Seni</a>
        </div>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                @foreach($seni as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->thumbnail}}</td>
                    <td>
                        <form action="{{ route('seni.delete', $row->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('seni.edit', $row->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <button type="submit"  class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tfoot>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection