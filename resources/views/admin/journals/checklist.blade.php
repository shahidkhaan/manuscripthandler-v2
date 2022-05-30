@extends('layouts.admin')

@section('title', 'checklist')

@section('content')

@if(session()->has('status'))
<div class="alert alert-success">
    {{ session('status')}}
</div>
@endif

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><b>Add Journal Checklist to (Abiotic and Biotic Stress Journal)</b></h4>
            <form method="post" action="{{route('store-checklist')}}" enctype="multipart/form-data">

                @csrf
                <br>
                <div class="mb-3 row">
                    <label for="example-number-input" class="col-md-3 col-form-label">Checklist Description</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"  rows="5" class="summernote">{{ old('description') }}</textarea>


                        @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="d-md-flex align-items-center mt-3">
                        <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class="btn btn-info font-weight-medium rounded-pill px-4">
                                <div class="d-flex align-items-center">
                                    <i data-feather="send" class="feather-sm fill-white me-2"></i>
                                    Submit
                                </div>
                            </button>
                        </div>
                    </div>
                </div>


                <input type="hidden" name="journalid" value="{{ $journals->id }}">




            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Manage Journal Checklist of (Abiotic and Biotic Stress Journal) </h4>
        </div>
        <div class="table-responsive">
            <table class="table customize-table mb-0 v-middle">
                <thead class="table-light">
                    <tr>
                        <th class="border-bottom border-top">S.No</th>
                        <th class="border-bottom border-top">Description</th>
                        <th class="border-bottom border-top">Options</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($checklist as $checklist )
                    <tr>
                        <td>{{$checklist->id}}</td>

                        <td>{{$checklist->description}}</td>

                        <td>
                            <a href="{{ route('edit-checklist', $checklist->id) }}" class="fas fa-pen">Edit</a>

                            <form action="{{ route('delete-checklist', $checklist->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection