@extends('back.layout.layout', [$title = 'User Massage']);


@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
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
          <ul class="ml-0 pl-0">
            <li>
                <strong>Name: </strong>
                <span>{{ $con->first_name }} {{ $con->last_name }}</span>
            </li>
            <li>
                <strong>Email: </strong>
                <span>{{ $con->email }}</span>
            </li>
            <li>
                <strong>Phone: </strong>
                <span>{{ $con->phone }}</span>
            </li>
          </ul>

          <h4 class="text-bold"><strong>Subject:</strong> {{ $con->subject }}</h4>

          <p class="pt-3">
            {{ $con->message }}
          </p>

          <hr>

          <form action="{{route('user.contact.reply')}}" class="pt-3" method="POST">
            @csrf
            <fieldset class="form-group">
                <label for="message">Answar him/her (by sending email)</label>
                <textarea id="message" rows="5" class="form-control" name="message" placeholder="Answare here..."></textarea>
                @if($errors->has('message'))
                <small class="text-danger">{{ $errors->first('message') }}</small>
                @endif
              </fieldset>

              <input type="hidden" value="{{ $con->email }}" name="email">
              <input type="hidden" value="{{ $con->first_name }} {{ $con->last_name }}" name="name">

              <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px; ">
                  <i class="fa fa-check-square-o"></i> Send Email
                </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection