@extends('back.layout.layout', [$title = 'Create a new blog']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Create a new blog</h4>
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
          <form class="form" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Category</label>
                <select class="select2 form-control" name="blog_category_id">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('blog_category_id'))
                    <small class="text-danger">{{ $errors->first('blog_category_id') }}</small>
                @endif
              </div>

              <!-- Tags start -->
              <div class="form-group">
                <label for="name">Tags (separated by comma "," )</label>
                <input type="text" id="name" class="form-control square custom-tag-input" placeholder="Tags">
              </div>

              <div class="form-group">
                <div class="custom-tag-output"></div>
              </div>

              <div class="form-group d-none">
                <select class="form-control custom-tag-select custom-select" name="tags[]" multiple></select>
              </div>
              <!-- Tags end -->

              <fieldset class="form-group">
                <div class="image-preview hide" >
                    <img style="max-width: 120px;" src="{{ asset('back/images/gallery/1.jpg') }}" alt="image">
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
                <label for="content">Content</label>
                <textarea id="content" rows="5" class="form-control" name="content" placeholder="content"></textarea>
                @if($errors->has('content'))
                <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group mb-0">
                <label for="details">Details</label>
                <textarea id="details" rows="5" class="form-control summernote" name="details" placeholder="details"></textarea>
                @if($errors->has('details'))
                <small class="text-danger">{{ $errors->first('details') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="custom_css">Custom CSS (optional)</label>
                <textarea id="custom_css" rows="5" class="form-control" name="custom_css" placeholder="Custom CSS"></textarea>
                @if($errors->has('custom_css'))
                <small class="text-danger">{{ $errors->first('custom_css') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="custom_js">Custom JavaScript (optional)</label>
                <textarea id="custom_js" rows="5" class="form-control" name="custom_js" placeholder="Custom JavaScript"></textarea>
                @if($errors->has('custom_js'))
                <small class="text-danger">{{ $errors->first('custom_js') }}</small>
                @endif
              </fieldset>

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