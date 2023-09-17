@extends('back.layout.layout', [$title = 'All Adds', $add_btn = 'Add new add', $add_btn_link = route('advertizement.create')])

@section('content')
<section id="html5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">All Adds</h4>
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
            <div class="card-body card-dashboard table-responsive">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Link</th>
                      <th>Status</th>
                      <th>Position</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($adds as $add)
                    <tr>
                      <td>
                        <img style="width: 90px;" src="{{asset($add->image)}}" alt="{{$add->image}}">
                      </td>
                      <td>{{ $add->title }}</td>
                      <td>{{ $add->link }}</td>
                      <td>
                        @if ($add->status == STATUS_ACTIVE)
                          <span class="text-primary p-1">Public</span>
                        @else
                            <span class="text-warning p-1">Draft</span>
                        @endif
                      </td>
                      <td>
                        {{$add->position}}
                      </td>
                      <td>{{ $add->created_at->format('d M Y') }}</td>
                      <td>
                        <div class="d-flex action-btn">
                          <a class="btn btn-icon btn-success" style="margin-right: 5px;" href="{{ route('advertizement.edit', $add->id) }}"><i class="ft-edit"></i></a>
                          <a data-id="{{ $add->id }}" class="btn btn-icon btn-danger delete-data" style="margin-right: 5px;" href="#"><i class="ft-trash-2"></i></a> 
                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('db_js')  
    <script>
        
         // Delete Data;
         $('.table').on('click', '.delete-data', function(e) {
             e.preventDefault();
             let deleteRoute = "{{ route('advertizement.delete') }}";
                 let delteteDataId = $(this).attr("data-id");
                 swal({
                     title: "Are you sure?",
                     text: "You will not be able to recover this imaginary item!",
                     icon: "warning",
                     showCancelButton: true,
                     buttons: {
                         cancel: {
                             text: "No, cancel please!",
                             value: null,
                             visible: true,
                             className: "btn-warning",
                             closeModal: false,
                         },
                         confirm: {
                             text: "Yes, delete it!",
                             value: true,
                             visible: true,
                             className: "",
                             closeModal: false,
                         },
                     },
                 }).then((isConfirm) => {
                     if (isConfirm) {
                         $.ajax({
                             type: "POST",
                             url: deleteRoute,
                             data: {
                                 id: delteteDataId,
                             },
                             success: function(response){
                              if(response == 'success') {
                                         swal({
                                        icon: "success",
                                        title: "Deleted!",
                                        text: "Your imaginary item has been deleted.",
                                        showConfirmButton: true,
                                        closeModal: false,
                                    });
        
                                    $('.table').load(' .table');
                                }
                                else {
                                    swal("Sorry!", response, "warning");
                                }
                             }
                              
                         });
                     } else {
                         swal({
                             icon: "error",
                             title: "Cancelled!",
                             text: "Your imaginary file is safe :",
                             timer: 2000,
                             showConfirmButton: true,
                         });
                     }
                 });
         });
     
     </script>
@endpush