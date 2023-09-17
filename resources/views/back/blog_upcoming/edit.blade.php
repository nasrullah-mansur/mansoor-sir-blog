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
          <form class="form" action="{{ route('up.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
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
                <select class="select2 form-control" name="blog_category_id">
                  @foreach ($categories as $category)
                  <option {{ $category->id == $blog->blog_category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
                @if ($errors->has('blog_category_id'))
                    <small class="text-danger">{{ $errors->first('blog_category_id') }}</small>
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


            <div style="border-top: 2px solid #444; backgorund-color: red; width: 100%; margin-top: 100px; margin-bottom: 30px;">
              <h2 class="pt-2">Sidebar Setting</h2>
            </div>

            <div class="form-body">
              

              <div class="form-group">
                <label for="name">Comment Section</label>
                <div class="row skin skin-square">

                  <fieldset class="d-block w-100 ml-1">
                    <input checked type="radio" name="comment" value="on" id="input-radio-21">
                    <label for="input-radio-21">Enable</label>
                  </fieldset>



                  <fieldset class="d-block w-100 ml-1">
                    <input type="radio" name="comment" value="off" id="input-radio-22">
                    <label for="input-radio-22">Disable</label>
                  </fieldset>

                </div>
              </div>



              <div class="form-group">
                <label for="name">Mini Course Section</label>
                <div class="row skin skin-square">

                  <fieldset class="d-block w-100 ml-1">
                    <input type="radio" name="mini_course" value="on" id="input-radio-31">
                    <label for="input-radio-31">Enable</label>
                  </fieldset>
                  <fieldset class="d-block w-100 ml-1">
                    <input checked type="radio" name="mini_course" value="off" id="input-radio-32">
                    <label for="input-radio-32">Disable</label>
                  </fieldset>
                  
                </div>
                <div class="form-group">
                  <input type="text" class="form-control square " placeholder="Mini Course Title" name="mini_course_title">
                  <br>
                  <input type="text" class="form-control square " placeholder="Mini Course Google Drive Link" name="mini_course_link">
                </div>
              </div>


              <div class="form-group">
                <label for="name">Advertizement Section</label>
                <div class="row skin skin-square">

                  <fieldset class="d-block w-100 ml-1">
                    <input type="radio" name="advertizement" value="on" id="input-radio-41">
                    <label for="input-radio-41">Enable</label>
                  </fieldset>
                  <fieldset class="d-block w-100 ml-1">
                    <input checked type="radio" name="advertizement" value="off" id="input-radio-42">
                    <label for="input-radio-42">Disable</label>
                  </fieldset>
                  
                </div>
                <div class="form-group">
                  <select class="select2 form-control" name="advertizement_id">
                    @foreach (advertizement() as $advertizement)
                    <option value="{{ $advertizement->id }}">{{ $advertizement->title }}</option>
                    @endforeach
                  </select>
                </div>
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