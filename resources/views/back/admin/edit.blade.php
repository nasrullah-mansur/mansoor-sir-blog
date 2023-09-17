@extends('back.layout.layout', [$title = 'Update patient'])

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Update patient</h4>
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
          <form class="form" action="{{ route('admin.admin.update', $user->id) }}" method="POST">
            @csrf
            <div class="form-body">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input value="{{$user->name}}" type="text" id="name" class="form-control square {{ $errors->has('name') ? 'is-invalid' : ''}} " placeholder="Full name" name="name">
                @if ($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="name">Phone</label>
                <input value="{{$user->phone}}" type="text" id="name" class="form-control square {{ $errors->has('phone') ? 'is-invalid' : ''}} " placeholder="Phone" name="phone">
                @if ($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input value="{{$user->email}}" disabled type="email" id="email" class="form-control square" >
              </div>
              <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" class="form-control square {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password" name="password">
                @if ($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="confirm">Confirm New Password</label>
                <input type="password" id="confirm" class="form-control square {{ $errors->has('confirm') ? 'is-invalid' : ''}}" placeholder="Confirm Password" name="confirm">
                @if ($errors->has('confirm'))
                    <small class="text-danger">{{ $errors->first('confirm') }}</small>
                @endif
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