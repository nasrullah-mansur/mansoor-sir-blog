@extends('back.layout.layout', [$title = 'Update the social']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Update the social</h4>
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
          <form class="form" action="{{ route('social.update', $social->id) }}" method="POST">
            @csrf
            <div class="form-body">
              
              <div class="form-group">
                <label for="label">Label</label>
                <input value="{{$social->label}}" type="text" id="label" class="form-control square {{ $errors->has('label') ? 'is-invalid' : ''}} " placeholder="Label" name="label">
                @if ($errors->has('label'))
                    <small class="text-danger">{{ $errors->first('label') }}</small>
                @endif
              </div>
              
              <div class="form-group">
                <link for="link">Link</label>
                <input value="{{$social->link}}" type="text" id="link" class="form-control square {{ $errors->has('link') ? 'is-invalid' : ''}} " placeholder="Link" name="link">
                @if ($errors->has('link'))
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                @endif
              </div>
              
              <div class="form-group">
                <link for="icon">Icon (fontawesome 5.2)</label>
                <input value="{{$social->icon}}" type="text" id="icon" class="form-control square {{ $errors->has('icon') ? 'is-invalid' : ''}} " placeholder="Icon" name="icon">
                @if ($errors->has('icon'))
                    <small class="text-danger">{{ $errors->first('icon') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label>Target</label>
                <select class="form-control" name="target">
                  <option value="_self">Self</option>
                    <option value="_blank">blank</option>
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