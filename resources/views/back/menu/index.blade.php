@extends('back.layout.layout', [$title = 'Menu Builder']) 

@section('content')
<section id="html5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Menu Builder</h4>
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
                <div class="pb-1 text-right">
                    <a href="#" data-toggle="modal" data-target="#add_item" class="btn btn-primary">Add Menu</a>
                </div>
                {{$dataTable->table()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- ADD ITEM MODEL -->
<div class="modal fade text-left" id="add_item" tabindex="-1" role="dialog" aria-labelledby="add_item_area" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary white">
            <h3 class="modal-title" id="add_item_area"> Add New Menu</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="data-form" method="POST" action="{{ route('menu.store') }}">
            @csrf
            <div class="modal-body">
            <fieldset class="form-group floating-label-form-group">
                <label for="label">Name</label>
                <input name="label" type="text" class="form-control" id="label" placeholder="Name">
                <span class="text-danger error-text"></span>
            </fieldset>
            
            <fieldset class="form-group floating-label-form-group">
                <label for="status" class="d-block">Menu Status</label>
                <select id="status" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" data-original-title="" title="">
                    <option value="{{ STATUS_ACTIVE }}">Public</option>
                    <option value="{{ STATUS_INACTIVE }}">Save Draft</option>
                </select>
            </fieldset>
            <br>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary add-item">Add Menu</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- ADD ITEM MODEL -->
@endsection


@push('db_js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        
         // Delete Data;
         $('.dataTable').on('click', '.delete-data', function(e) {
             e.preventDefault();
             let deleteRoute = "{{ route('menu.delete') }}";
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
                                if(response == '') {
                                    swal({
                                        icon: "success",
                                        title: "Deleted!",
                                        text: "The menu removed successfully.",
                                        showConfirmButton: true,
                                        closeModal: false,
                                    });
        
                                    $('.dataTable').DataTable().ajax.reload();
                                }
                                 else {
                                    swal("Sorry!", response.text, "warning");
                                   
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
