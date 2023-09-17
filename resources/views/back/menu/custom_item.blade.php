<!-- Custom Item -->
<div class="card collapse-icon accordion-icon-rotate">
    <div id="custom-item-heading" class="card-header">
        <a data-toggle="collapse" href="#custom-item" aria-expanded="false" aria-controls="custom-item" class="card-title lead collapsed">Custom Link</a>
    </div>
    <div id="custom-item" role="tabpanel" aria-labelledby="custom-item-heading" class="collapse" aria-expanded="false">
        <div class="card-content">
            <div class="card-body dd-custom">
                <div class="form form-horizontal">
                    <ul class="skin skin-flat m-0 p-0 list-unstyled">
                        <li data-menu-id="{{ $menu_id }}" data-label="" data-slug="" data-class="" data-target="_self">
                            <div class="form-body">
                                
                                <div class="form-group row">
                                    <label class="col-12 label-control">Label</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Label" name="label" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 label-control">URL</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Label" name="slug" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 label-control">CSS Class</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="CSS Class" name="class" />
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions text-right">
                                <button class="btn btn-primary add-custom-item"><i class="ft-plus"></i> Add to menu</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('menu_js')
    <script>
         function customMenuAdd() {
            let getLiSelect = $(".dd-custom li")[0];
            $(".add-custom-item").on("click", function () {
                
                let setData = addCustomMenuItem(getLiSelect);

                $.ajax({
                    type: "POST",
                    url: "{{ route('menuItem.addItem') }}",
                    data: setData,
                    success: function (data) {
                        toastr.success("Menu item successfully added!", "WELL DONE");
                        $('#list-area').load(' #list-area', function() {
                            autoPosition();
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            });
        }
        customMenuAdd();
        
    </script>
@endpush