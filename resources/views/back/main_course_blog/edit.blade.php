@extends('back.layout.layout', [$title = 'Edit blog item']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Edit blog item</h4>
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
          <form class="form" action="{{ route('main.course.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Title</label>
                <input value="{{ $blog->title }}" type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Category</label>
                <select class="select2 form-control" name="main_course_blog_category_id">
                  @foreach ($categories as $category)
                  <option {{ $category->id == $blog->main_course_blog_category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('main_course_blog_category_id'))
                    <small class="text-danger">{{ $errors->first('main_course_blog_category_id') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select Course</label>
                <select class="select2 form-control" name="main_course_id">
                  @foreach ($courses as $course)
                  <option {{ $course->id == $blog->main_course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('main_course_id'))
                    <small class="text-danger">{{ $errors->first('main_course_id') }}</small>
                @endif
              </div>

              

              <fieldset class="form-group">
                <div class="image-preview" >
                    <img style="max-width: 120px;" src="{{ asset($blog->image) }}" alt="image">
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
                <textarea id="content" rows="5" class="form-control" name="content" placeholder="content">{{ $blog->content }}</textarea>
                @if($errors->has('content'))
                <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group mb-0">
                <label for="details">Details</label>
                <textarea id="details" rows="5" class="form-control summernote" name="details" placeholder="details">{{ $blog->details }}</textarea>
                @if($errors->has('details'))
                <small class="text-danger">{{ $errors->first('details') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="custom_css">Custom CSS (optional)</label>
                <textarea id="custom_css" rows="5" class="form-control" name="custom_css" placeholder="Custom CSS">{{ $blog->custom_css }}</textarea>
                @if($errors->has('custom_css'))
                <small class="text-danger">{{ $errors->first('custom_css') }}</small>
                @endif
              </fieldset>

              <fieldset class="form-group">
                <label for="custom_js">Custom JavaScript (optional)</label>
                <textarea id="custom_js" rows="5" class="form-control" name="custom_js" placeholder="Custom JavaScript">{{ $blog->custom_js }}</textarea>
                @if($errors->has('custom_js'))
                <small class="text-danger">{{ $errors->first('custom_js') }}</small>
                @endif
              </fieldset>

              <div class="form-group">
                <label for="button_text">Button Text</label>
                <input value="{{ $blog->button_text }}" type="text" id="button_text" class="form-control square {{ $errors->has('button_text') ? 'is-invalid' : ''}} " placeholder="Button Text" name="button_text">
                @if ($errors->has('button_text'))
                    <small class="text-danger">{{ $errors->first('button_text') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option {{ $blog->status == STATUS_ACTIVE ? 'selected' : '' }} value="{{ STATUS_ACTIVE }}">Public</option>
                    <option {{ $blog->status == STATUS_INACTIVE ? 'selected' : '' }} value="{{ STATUS_INACTIVE }}">Save Draft</option>
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