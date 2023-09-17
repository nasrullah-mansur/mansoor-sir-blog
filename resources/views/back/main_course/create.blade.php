@extends('back.layout.layout', [$title = 'Create a new course']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Create a new course</h4>
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
          <form class="form" action="{{ route('main.course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-body">
              <div class="form-group">
                <label for="name">Title</label>
                <input type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>

              
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

              <div class="form-group">
                <label>Select for Reletade Blog Link</label>
                <select class="select2 form-control" name="blog_link">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('blog_link'))
                    <small class="text-danger">{{ $errors->first('blog_link') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select for Complementary Link</label>
                <select class="select2 form-control" name="complementary_link">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('complementary_link'))
                    <small class="text-danger">{{ $errors->first('complementary_link') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Select for Social Proof Link</label>
                <select class="select2 form-control" name="social_proof_link">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('social_proof_link'))
                    <small class="text-danger">{{ $errors->first('social_proof_link') }}</small>
                @endif
              </div>

              <div class="form-body">
                <div class="form-group">
                  <label for="name">Mini Course Page Link</label>
                  <input type="text" id="name" class="form-control square {{ $errors->has('mini_course_link') ? 'is-invalid' : ''}} " placeholder="Mini Course Page Link" name="mini_course_link">
                  @if ($errors->has('mini_course_link'))
                      <small class="text-danger">{{ $errors->first('mini_course_link') }}</small>
                  @endif
                </div>

              <div class="form-body">
                <div class="form-group">
                  <label for="name">Buy Now Link</label>
                  <input type="text" id="name" class="form-control square {{ $errors->has('buy_now_link') ? 'is-invalid' : ''}} " placeholder="Mini Course Page Link" name="buy_now_link">
                  @if ($errors->has('buy_now_link'))
                      <small class="text-danger">{{ $errors->first('buy_now_link') }}</small>
                  @endif
                </div>
              

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="{{ STATUS_ACTIVE }}">Public</option>
                    <option value="{{ STATUS_UPCOMING }}">Upcoming</option>
                    <option value="{{ STATUS_INACTIVE }}">Save Draft</option>
                </select>
              </div>
                            
            </div>

            
                            
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection