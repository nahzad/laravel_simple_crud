

    <div class="col-md-12 mx-auto">

        <div class="card">
            {{-- <div class="card-header">
                <h4>Blog Update
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary float-end" selector="blogCreate">Back</a>
                </h4>
            </div> --}}
            <div class="card-body">
                    <form action="{{ route('blogs.update',$blogEdit->id) }}" method="POST" id="blogUpdate">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="Your title here" value="{{ $blogEdit->title }}">

                    </div>
                    <div class="form-group mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="desc" cols="5" rows="2">{{ $blogEdit->description }}</textarea>

                    </div>
                    <div class="form-group mb-3">
                        <label for="isPublish" class="form-label">Status</label>
                        <select name="status" id="isPublish" class="form-select">
                            <option value="">Select</option>
                            <option @if ($blogEdit->status == 1) selected @endif value="1">Active</option>
                            <option @if ($blogEdit->status == 0) selected @endif value="0" >InActive</option>
                        </select>

                    </div>

                </form>
            </div>
        </div>
    </div>

