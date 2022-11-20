@extends('welcome')

@section('title', 'Blog Show')



@section('content')

    <div class="col-md-12 mx-auto">

        <div class="card">

            <div class="card-header">
                <h4>Show single data
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary float-end">Back To list</a>
                </h4>
            </div>
            <div class="card-body">

               <table class="table">
                <tr>
                    <th>ID :</th>
                    <td> <input type="text" class="form-control" value="{{ $show_single->id }}"> </td>
                </tr>
                <tr>
                    <th> <label for="" class="form-label">Blog Title :</label> </th>
                    <td> <input type="text" class="form-control" value="{{ $show_single->title }}"> </td>
                </tr>
                <tr>
                    <th> <label for="" class="form-label">Blog Description :</label> </th>
                    <td> <input type="text" class="form-control" value="{{ $show_single->description }}"> </td>
                </tr>
                <tr>
                    <th> <label for="" class="form-label">Status :</label> </th>
                    <td><input type="text" class="form-control"
                      @if($show_single->status == 1)
                      value = 'Active'
                      @elseif ($show_single->status == 0)
                      value = 'In Active'
                      @endif>
                    </td>
                </tr>
               </table>
            </div>
        </div>
    </div>
@endsection


