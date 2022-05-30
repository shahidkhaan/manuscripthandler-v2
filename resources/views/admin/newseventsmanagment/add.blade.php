@extends('layouts.admin')

@section('title', 'newseventsmanagment')

@section('content')



<div class="row">
    <div class="col-sm-12">


        <div class="card card-body">
            <h4 class="card-title">Add News</h4>

            <form  method="post"  action="{{ route('newseventsmanagment.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Tittle</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <label>Description</label>

                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="120" rows="5"  placeholder="description"></textarea>
                @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

            </form>
        </div>
    </div>
</div>

@endsection