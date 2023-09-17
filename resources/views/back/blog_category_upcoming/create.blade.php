@extends('back.layout.layout', [$title = 'Create a blog category']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Create a blog category</h4>
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
          <form class="form" action="{{ route('up.blog.category.store') }}" method="POST">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Category Title</label>
                <input type="text" id="name" class="form-control square {{ $errors->has('title') ? 'is-invalid' : ''}} " placeholder="Title" name="title">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>
                            
            </div>

            
            <div style="border-top: 2px solid #444; backgorund-color: red; width: 100%; margin-top: 100px; margin-bottom: 30px;">
              <h2 class="pt-2">Sidebar Setting</h2>
            </div>

            <div class="form-body">
            

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