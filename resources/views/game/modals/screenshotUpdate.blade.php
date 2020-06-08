
<!-- Modal -->
<div class="modal fade" id="screenshotModalUpdate" tabindex="-1" role="dialog" aria-labelledby="screenshotModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="edit-form" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-header  bg-purple">
                <h5 class="modal-title" id="screenshotModalLabel">Update screenshot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($errors->any())
                    <div class="alert alert-danger error" id="{{session('errorsUpdate') ? 'errorsUpdate' : ''}}">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-row">
                    <input type="hidden" id="modal" name="modal" value="update">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        </div>
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Subtitle</span>
                        </div>
                        <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{old('subtitle')}}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                        </div>
                        <textarea rows="2" id="description" name="description" class="form-control">{{old('description')}}</textarea>
                    </div>

                    <div class="custom-file">
                        <input type="file" name="screenshot" id="screenshot" class="custom-file-input" id="customFile" value="{{old('screenshot')}}">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
