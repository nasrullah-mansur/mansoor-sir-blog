@extends('back.layout.layout', [$title = 'Contact Section'])

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-square-controls">Contact Section</h4>
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
          <form class="form" action="{{ route('contact.section.update') }}" method="POST">
            @csrf
            <div class="form-body">


              <div class="form-group">
                <label for="section_title">Section Title</label>
                <input type="text" id="section_title" class="form-control square" value="{{ $contact ? $contact->section_title : '' }}" placeholder="Section Title" name="section_title">
                @if ($errors->has('section_title'))
                    <small class="text-danger">{{ $errors->first('section_title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="form_title">Form Title</label>
                <input type="text" id="form_title" class="form-control square" value="{{ $contact ? $contact->form_title : '' }}" placeholder="Form Title" name="form_title">
                @if ($errors->has('form_title'))
                    <small class="text-danger">{{ $errors->first('form_title') }}</small>
                @endif
              </div>


              <fieldset class="form-group">
                <label for="form_description">Form description</label>
                <textarea id="form_description" rows="5" class="form-control" name="form_description" placeholder="Form description">{{ $contact ? $contact->form_description : '' }}</textarea>
                @if($errors->has('form_description'))
                <small class="text-danger">{{ $errors->first('form_description') }}</small>
                @endif
              </fieldset>

              
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control square" value="{{ $contact ? $contact->email : '' }}" placeholder="Email" name="email">
                @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
              </div>
              
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" class="form-control square" value="{{ $contact ? $contact->phone : '' }}" placeholder="Phone" name="phone">
                @if ($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
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