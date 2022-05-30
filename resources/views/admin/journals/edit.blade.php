@extends('layouts.admin')

@section('title', 'edit_journals')

@section('content')



<div class="row">
    <div class="col-sm-12">
        <div class="card card-body">
            <h4 class="card-title">Add Journals</h4>
            <form method="post" action="{{ route('journals.update',$journals->id) }}" enctype="multipart/form-data">
            @method('put')    
            @csrf
                <div class="mb-3">
                    <label>Journal:</label>
                    <input type="text" id="name" name="name" value="{{$journals->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Journal">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Journal Home Page:</label>
                    <input type="text" id="journalHomePage" name="journalHomePage" value="{{$journals->journalHomePage }}" class="form-control @error('journalHomePage') is-invalid @enderror" placeholder="Journal Home Page">
                    @error('journalHomePage')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>SEO URL:</label>
                    <input type="text" id="seo" name="seo" value="{{$journals->seo }}" class="form-control @error('seo') is-invalid @enderror" value="" placeholder="SEO URL">
                    @error('seo')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Left Image:</label>
                <div class="input-group">
                      <div class="custom-file">
                            <input type="file" value="{{$journals->leftimage}}" class="form-control @error('leftimage') is-invalid @enderror" id="leftimage" name="leftimage">
                            @error('leftimage')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Detail Page Image:</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" value="{{$journals->detailimage}}" id="detailimage" name="detailimage" class="form-control @error('detailimage') is-invalid @enderror" aria-describedby="inputGroupFileAddon01">
                            @error('detailimage')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Banner Image:</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" value="{{$journals->bannerImage}}" class="form-control @error('bannerImage') is-invalid @enderror" id="bannerImage" name="bannerImage" >
                            @error('bannerImage')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Text area</label>
                    <textarea value="{{$journals->shortDescription}}" class="form-control @error('shortDescription') is-invalid @enderror" id="shortDescription" name="shortDescription" rows="5"></textarea>
                    @error('shortDescription')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn px-4 rounded-pill btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection