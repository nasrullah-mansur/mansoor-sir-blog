@extends('back.layout.layout', [$title = 'Banner Section Update']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Banner Section Update</h4>
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
          <form class="form" action="{{ route('banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $banner ? $banner->title : '' }}" type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              

              <fieldset class="form-group">
                <div class="image-preview {{ $banner ? '' : 'hide' }}" >
                    <img style="max-width: 120px;" src="{{ asset($banner ? $banner->image : 'back/images/gallery/1.jpg') }}" alt="image">
                </div>
                <label for="basicInputFile">Choose Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input-show" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($errors->has('image'))
                <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="content">Description</label>
                <textarea id="content" rows="5" class="form-control summernote" name="content" placeholder="content">{{ $banner ? $banner->content : '' }}</textarea>
                @if($errors->has('content'))
                <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label for="btn_label">Button Label</label>
                <input value="{{ $banner ? $banner->btn_label : '' }}" type="text" id="btn_label" class="form-control square {{ $errors->has('btn_label') ? 'is-invalid' : ''}} " placeholder="btn_label" name="btn_label">
                @if ($errors->has('btn_label'))
                    <small class="text-danger">{{ $errors->first('btn_label') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="btn_link">Button Link</label>
                <input value="{{ $banner ? $banner->btn_link : '' }}" type="text" id="btn_link" class="form-control square {{ $errors->has('btn_link') ? 'is-invalid' : ''}} " placeholder="btn_link" name="btn_link">
                @if ($errors->has('btn_link'))
                    <small class="text-danger">{{ $errors->first('btn_link') }}</small>
                @endif
              </div>
                            
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              <button type="button" type="reset" class="btn btn-warning">
                <i class="ft-x"></i> Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection