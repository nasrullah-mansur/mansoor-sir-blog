@extends('back.layout.layout', [$title = 'Blog Sidebar'])

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Blog Sidebar</h4>
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
          <form class="form" action="{{ route('blog.sidebar.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">

              <fieldset class="form-group">
                <label for="content">Content</label>
                <textarea id="content" rows="5" class="form-control" name="content" placeholder="content">{{ $cta ? $cta->content : '' }}</textarea>
                @if($errors->has('content'))
                <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label for="btn_text">Button Text</label>
                <input value="{{$cta ? $cta->btn_text : ''}}" type="text" id="btn_text" class="form-control square {{ $errors->has('btn_text') ? 'is-invalid' : ''}} " placeholder="Button Text" name="btn_text">
                @if ($errors->has('btn_text'))
                    <small class="text-danger">{{ $errors->first('btn_text') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="btn_link">Button Link</label>
                <input value="{{$cta ? $cta->btn_link : ''}}" type="text" id="btn_link" class="form-control square {{ $errors->has('btn_link') ? 'is-invalid' : ''}} " placeholder="Button Link" name="btn_link">
                @if ($errors->has('btn_link'))
                    <small class="text-danger">{{ $errors->first('btn_link') }}</small>
                @endif
              </div>

              <fieldset class="form-group">
                <div class="image-preview {{$cta ? '' : 'hide'}}" >
                    <img style="max-width: 120px;" src="{{ asset($cta ? $cta->image : 'back/images/gallery/1.jpg') }}" alt="image">
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