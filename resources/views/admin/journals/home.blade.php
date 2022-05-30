@extends('layouts.admin')

@section('title', 'journals')

@section('content')


<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" />



<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('journals.create') }}" class="btn btn-success" style="margin: 20px;">Add journals</a>
    </li>


    <div class="card-body">
        <form class="row" method="get" action="{{ url('admin/journals')}}">
            <div class="col-sm-3">
                <select class="form-control form-select " name="q">
                    <option>Admin</option>
                    <option>aaa</option>
                    <option>bbb</option>
                    <option>abc</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </form>
    </div>
</ol>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif


<div class="card">
    <div class="card-body">
        <h4 class="card-title"> Manage Journals</h4>
    </div>
    <div class="table-responsive">
        <table class="table customize-table mb-0 v-middle">
            <thead class="table-light">
                <tr>
                    <th>S.No</th>
                    <th>Journal</th>
                    <th>Display Status</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>




                @foreach ($journals as $journals)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            {{ $journals->id }}
                        </div>
                    </td>

                    <td>{{ $journals->name }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="#">
                                <img src="../assets/images/users/1.jpg" class="rounded-circle me-n2 card-hover border border-2 border-white" width="35">
                            </a>

                        </div>
                    </td>
                    <td> {{ $journals->status }}</td>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="#" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i data-feather="more-horizontal" class="feather-sm"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('journals.edit', $journals->id) }}">Edit</a></li>
                                <form id="frmDelete" action="{{ route('journals.destroy', $journals->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input onclick="return window.confirm('Are You Sure to Delete This Journals?');" type="submit" name="btnDel" value="Delete" class="dropdown-item">
                                </form>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="#" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i data-feather="more-horizontal" class="feather-sm"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <li> <a class="dropdown-item" href="{{route('contentpages',$journals->id)}}"> ContentPages</a></li>

                                <li> <a class="dropdown-item" class="dropdown-item" href="{{route('checklist',$journals->id)}}">Checklist</a></li>

                                <li> <a class="dropdown-item" href="{{route('checklisttext',$journals->id)}}"> ChecklistText</a></li>

                                <li> <a class="dropdown-item" href="{{route('typesofmanuscript',$journals->id)}}">TypesManuscript</a></li>

                                <li> <a class="dropdown-item" href="{{route('filedesignation',$journals->id)}}">FileDesignation</a></li>

                                <li> <a class="dropdown-item" href="{{route('areaofspecificinterest',$journals->id)}}">AreaInterest</a></li>

                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>














<script type="text/javascript" src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js">

</script>

<script>
    $(document).ready(function() {
        $('#journal').DataTable();
    });
</script>



@endsection