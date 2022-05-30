@extends('layouts.admin')

@section('title', 'newseventsmanagment')

@section('content')

<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"/> -->


@if(session()->has('status'))
<div class="alert alert-success">
    {{ session('status')}}
</div>
@endif

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('newseventsmanagment.create') }}" class="btn btn-success" style="margin-left: 15px;">Add News</a>
    </li>
</ol>


<div class="row">
    <div >


        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
        @endif

        <div class="card">

            <div class="table-responsive">
                <table class="table customize-table mb-0 v-middle">
                    <thead class="table-light">
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @foreach ($newseventsmanagment as $newseventsmanagment)
                    <tr>
                        <td>{{ $newseventsmanagment->id }}</td>
                        <td>{{ $newseventsmanagment->title }}</td>
                        <td>{{ $newseventsmanagment->description }}</td>




                        <td>
                            <a href="{{ route('newseventsmanagment.edit', $newseventsmanagment->id) }}" class="fas fa-pen">Edit</a>



                            <form action="{{ route('newseventsmanagment.destroy', $newseventsmanagment->id) }}" method="post">

                                @csrf
                                @method('delete')
                              <button onclick="return window.confirm('Are You Sure to Delete This News?');" type="submit" class="btn btn-outline-danger">Delete</button>

                            </form>
                        </td>
                    </tr>

                    @endforeach


                    </form>
                    </tbody>
                </table>
            </div>
        </div>

        </div>

        <!-- 
<script type="text/javascript" src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js">

    </script>

    <script>

$(document).ready( function () {
    $('#newseventsmanagmentsid').DataTable();
} );
    </script> -->



        @endsection