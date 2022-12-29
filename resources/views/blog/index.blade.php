@extends('layouts.master')

@section('title', 'Blog list')



@section('main_content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h4>Blog List
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary open_modal float-end" selector="blogCreate" modal_title="Blog Create" modal_type="Create" modal_size="large" class_name = "btn btn-secondary disable-on-click">Add Blog</a>
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
                                        <a href="{{ route('blogs.edit', $blog->id) }}" selector="blogUpdate"  class="btn btn-success btn-sm open_modal" modal_title="Blog Edit" modal_type="Update" class_name="btn btn-secondary disable-on-click" modal_size="large">Edit</a>

                                        <a href="{{ route('blogs.show',$blog->id) }}" selector="blogShow" class="btn btn-warning btn-sm open_modal"
                                            modal_title="Blog Details" modal_type="Show" class_name="btn btn-secondary disable-on-click" modal_size="large">Show</a>

                                            <a class="deleteAction" delete_Link="{{ route('blogs.destroy',$blog->id) }}" href="" style="display:inline-block">
                                                <form  action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm ">Delete</button>
                                                </form>
                                            </a>

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


