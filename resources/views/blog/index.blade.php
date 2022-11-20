@extends('welcome')

@section('title', 'Blog list')

@include('inc.topNavbar')

@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h4>Blog List
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary float-end">Add Blog</a>
                </h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Blog Title</th>
                                <th>Blog Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog_list as $key => $blog)
                            <tr>
                                    <input type="hidden" class="service_delete_id" value="{{ $blog->id }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td>
                                        @if ($blog->status == 1)
                                            {{ 'Active' }}
                                        @elseif ($blog->status == 0)
                                            {{ 'In Active' }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" selector="blogUpdate"  class="btn btn-warning btn-sm open-modal" modal-title="Blog Edit" modal-type="Update" class-name="btn btn-warning disable-on-click" modal-size="large">Edit</a>

                                        <a href="{{ route('blogs.show',$blog->id) }}" selector="blogShow" class="btn btn-success btn-sm open-modal"
                                            modal-title="Blog Details" modal-type="Show" className="btn btn-info disable-on-click" modal-size="large">Show</a>

                                        <a href="{{ route('blogs.destroy',$blog->id) }}"
                                            class="btn btn-danger btn-sm serviceDeleteBtn" delete_link="{{ route('blogs.destroy',$blog->id) }}">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush --}}
