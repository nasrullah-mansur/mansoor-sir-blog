@extends('back.layout.layout', [$title = 'Theme appearance']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Theme appearance</h4>
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
          <form class="form" action="{{ route('appearance.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">

              <div class="form-group">
                <label for="theme_name">Theme Name</label>
                <input value="{{ theme() ? theme()->theme_name : ''}}" type="text" id="theme_name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Theme name" name="theme_name">
                @if ($errors->has('theme_name'))
                    <small class="text-danger">{{ $errors->first('theme_name') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="admin_name">Admin Name</label>
                <input value="{{ theme() ? theme()->admin_name : ''}}" type="text" id="admin_name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Admin name" name="admin_name">
                @if ($errors->has('admin_name'))
                    <small class="text-danger">{{ $errors->first('admin_name') }}</small>
                @endif
              </div>

              

              <fieldset class="form-group">
                <div class="image-preview {{ theme() ? '' : 'hide' }}" >
                    <img style="max-width: 120px;" src="{{ asset(theme() ? theme()->logo : 'back/images/gallery/1.jpg') }}" alt="image">
                </div>
                <label for="basicInputFile">Choose Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input-show" id="image" name="logo">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($errors->has('logo'))
                <small class="text-danger">{{ $errors->first('logo') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <div class="image-preview {{ theme() ? '' : 'hide' }}" >
                    <img style="max-width: 120px;" src="{{ asset(theme() ? theme()->favicon : 'back/images/gallery/1.jpg') }}" alt="image">
                </div>
                <label for="basicInputFile">Choose Favicon</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input image-input-show" id="image" name="favicon">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($errors->has('favicon'))
                <small class="text-danger">{{ $errors->first('favicon') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group mb-0">
                <label for="address">Address</label>
                <textarea id="address" rows="5" class="form-control summernote" name="address" placeholder="Address">{{ theme() ? theme()->address : '' }}</textarea>
                @if($errors->has('address'))
                <small class="text-danger">{{ $errors->first('address') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="meta">Meta Tags</label>
                <textarea id="meta" rows="5" class="form-control" name="meta" placeholder="Meta tags">{{ theme() ? theme()->meta : '' }}</textarea>
                @if($errors->has('meta'))
                <small class="text-danger">{{ $errors->first('meta') }}</small>
                @endif
              </fieldset>

              

              <fieldset class="form-group">
                <label for="custom_css">Custom CSS</label>
                <textarea id="custom_css" rows="5" class="form-control" name="custom_css" placeholder="Custom CSS">{{ theme() ? theme()->custom_css : '' }}</textarea>
                @if($errors->has('custom_css'))
                <small class="text-danger">{{ $errors->first('custom_css') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="custom_javascript">Custom JavaScript</label>
                <textarea id="custom_javascript" rows="5" class="form-control" name="custom_javascript" placeholder="Custom JavaScript">{{ theme() ? theme()->custom_javascript : '' }}</textarea>
                @if($errors->has('custom_javascript'))
                <small class="text-danger">{{ $errors->first('custom_javascript') }}</small>
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