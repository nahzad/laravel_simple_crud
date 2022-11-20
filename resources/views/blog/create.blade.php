@extends('welcome')

@section('title', 'Blog Create')

@section('content')

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>Blog Create
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary float-end" selector="blogCreate">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <h5>Add Blog :</h5>

                <form action="{{ route('blogs.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Your title here">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="desc" cols="5" rows="2"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="isPublish" class="form-label">Status</label>
                        <select name="status" id="isPublish" class="form-select">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
