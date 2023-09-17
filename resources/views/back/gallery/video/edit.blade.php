@extends('back.layout.layout', [$title = 'Update the video']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Update the video</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-content collapse show">
        <div class="card-body">
          <form class="form" action="{{ route('video_gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              
              <fieldset class="form-group">
                <label for="iframe_link">Iframe Link</label>
                <textarea id="iframe_link" rows="5" class="form-control" name="iframe_link" placeholder="iframe_link">{{ $gallery->iframe_link }}</textarea>
                @if($errors->has('iframe_link'))
                <small class="text-danger">{{ $errors->first('iframe_link') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label>Select Category</label>
                <select class="select2 form-control" name="video_gallery_category_id">
                  @foreach ($categories as $category)
                  <option {{ $category->id == $gallery->video_gallery_category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('video_gallery_category_id'))
                    <small class="text-danger">{{ $errors->first('video_gallery_category_id') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="{{ STATUS_ACTIVE }}">Public</option>
                    <option value="{{ STATUS_INACTIVE }}">Save Draft</option>
                </select>
              </div>
                            
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              <button type="reset" class="btn btn-warning">
                <i class="ft-x"></i> Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection