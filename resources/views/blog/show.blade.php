

    <div class="col-md-12 mx-auto">

        <div class="card">
{{--
            <div class="card-header">
                <h4>Show single data
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary float-end">Back To list</a>
                </h4>
            </div> --}}
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><label for="" class="form-label">Blog Title :</label></th>
                        <td><span>{{ $show_single->title }}</span></td>
                    </tr>
                    <tr>
                        <th><label for="" class="form-label">Blog Description :</label></th>
                        <td><span>{{ $show_single->description }}</span></td>
                    </tr>
                    <tr>
                        <th><label for="" class="form-label">Status :</label></th>
                        <td><span>@if ($show_single->status == 1)
                            Active
                            @elseif ($show_single->status == 0)
                            In Active
                        @endif </span></td>
                    </tr>

                </table>


            </div>
        </div>
    </div>



