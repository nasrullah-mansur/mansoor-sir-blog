
<div id="list-area">
    <ol class="dd-list" id="dd-list">
        <!-- First Label List -->
        @foreach ($menu_items as $menu_item)
        <li data-id="{{ $menu_item->id }}" data-label="{{ $menu_item->label }}" data-class="{{ $menu_item->class }}" data-target="_self" data-slug="{{ $menu_item->slug }}" data-pid="0" data-position="" class="dd-item">
            <div class="dd-handle d-flex justify-content-between">
                <div>
                    <span class="title-show text-capitalize">{{ $menu_item->label }}</span>
                </div>
            </div>
            <div class="list-content">
                <div class="dd-text">
                    <a href="javascript:void(0);" class="collapsed-btn">
                        <span class="ft-chevron-down"></span>
                    </a>
                </div>
                <div class="collapse border">
                    <div class="dd-details">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <div class="col-12 px-0">
                                                <label class="col-12 label-control text-bold-500">Label</small>
                                                    <input value="{{ $menu_item->label }}" type="text" class="form-control" placeholder="Label" name="label" />
                                                </label>
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <div class="col-12 px-0">
                                                <label class="col-12 label-control">URL
                                                    <input value="{{ $menu_item->slug }}" type="text" class="form-control" placeholder="URL" name="slug" />
                                                </label>
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <div class="col-12 px-0">
                                                <label class="col-12 label-control">CSS Class
                                                    <input value="{{ $menu_item->class }}" type="text" class="form-control" placeholder="CSS Class" name="class" />
                                                </label>
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label class="col-12 label-control">Target</label>
                                            <div class="col-12">
                                                <select class="form-control" name="target">
                                                    <option value="_self">Open link directly</option>
                                                    <option value="_blank">Open link in new tab</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-right">
                                        <button type="button" class="btn btn-danger remove-btn"><i class="ft-x"></i> Remove Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol>
                <!-- Second Label List -->
                @foreach ($menu_item->menuItem as $label_two)
                <li data-id="{{ $label_two->id }}" data-label="{{ $label_two->label }}" data-slug="{{$label_two->slug}}" data-class="{{ $label_two->class }}" data-target="_self" data-pid="0" data-position="" class="dd-item">
                    <div class="dd-handle d-flex justify-content-between">
                        <div>
                            <span class="title-show text-capitalize">{{ $label_two->label }}</span>
                        </div>
                    </div>
                    <div class="list-content">
                        <div class="dd-text">
                            <a href="javascript:void(0);" class="collapsed-btn">
                                <span class="ft-chevron-down"></span>
                            </a>
                        </div>
                        <div class="collapse border">
                            <div class="dd-details">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <div class="col-12 px-0">
                                                        <label class="col-12 label-control text-bold-500">Label</small>
                                                            <input value="{{ $label_two->label }}" type="text" class="form-control" placeholder="Label" name="label" />
                                                        </label>
                                                    </div>
                                                </div>
            
                                                <div class="form-group row">
                                                    <div class="col-12 px-0">
                                                        <label class="col-12 label-control">URL
                                                            <input value="{{ $label_two->slug }}" type="text" class="form-control" placeholder="URL" name="slug" />
                                                        </label>
                                                    </div>
                                                </div>
            
                                                <div class="form-group row">
                                                    <div class="col-12 px-0">
                                                        <label class="col-12 label-control">CSS Class
                                                            <input value="{{ $label_two->class }}" type="text" class="form-control" placeholder="CSS Class" name="class" />
                                                        </label>
                                                    </div>
                                                </div>
            
                                                <div class="form-group row">
                                                    <label class="col-12 label-control">Target</label>
                                                    <div class="col-12">
                                                        <select class="form-control" name="target">
                                                            <option value="_self">Open link directly</option>
                                                            <option value="_blank">Open link in new tab</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions text-right">
                                                <button type="button" class="btn btn-danger remove-btn"><i class="ft-x"></i> Remove Item</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ol>
                        <!-- Third menu -->
                    @foreach ($label_two->childMenuItem as $label_three)
                    <li data-id="{{ $label_three->id }}" data-label="{{ $label_three->label }}" data-slug="{{$label_three->slug}}" data-class="{{ $label_three->class }}" data-target="_self" data-pid="0" data-position="" class="dd-item">
                        <div class="dd-handle d-flex justify-content-between">
                            <div>
                                <span class="title-show text-capitalize">{{ $label_three->label }}</span>
                            </div>
                        </div>
                        <div class="list-content">
                            <div class="dd-text">
                                <a href="javascript:void(0);" class="collapsed-btn">
                                    <span class="ft-chevron-down"></span>
                                </a>
                            </div>
                            <div class="collapse border">
                                <div class="dd-details">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group row">
                                                        <div class="col-12 px-0">
                                                            <label class="col-12 label-control text-bold-500">Label</small>
                                                                <input value="{{ $label_three->label }}" type="text" class="form-control" placeholder="Label" name="label" />
                                                            </label>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group row">
                                                        <div class="col-12 px-0">
                                                            <label class="col-12 label-control">URL
                                                                <input value="{{ $label_three->slug }}" type="text" class="form-control" placeholder="URL" name="slug" />
                                                            </label>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group row">
                                                        <div class="col-12 px-0">
                                                            <label class="col-12 label-control">CSS Class
                                                                <input value="{{ $label_three->class }}" type="text" class="form-control" placeholder="CSS Class" name="class" />
                                                            </label>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group row">
                                                        <label class="col-12 label-control">Target</label>
                                                        <div class="col-12">
                                                            <select class="form-control" name="target">
                                                                <option value="_self">Open link directly</option>
                                                                <option value="_blank">Open link in new tab</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions text-right">
                                                    <button type="button" class="btn btn-danger remove-btn"><i class="ft-x"></i> Remove Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    </ol>
                </li>
                @endforeach
            </ol>
        </li>
        @endforeach
    </ol>
</div>

@push('menu_js')
    <script>
        $("#list-area").on("click", ".remove-btn", function () {
            let targetLi = $(this).parents("li").first();
            let deleteItemId = targetLi.attr("data-id");
            let deleteItemChildren = targetLi.find("li.dd-item").length;
    
            if (deleteItemChildren > 0) {
                toastr.warning("Please remove inner item first!", "Sorry");
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('menuItem.delete') }}",
                    data: {
                        id: deleteItemId,
                    },
                    success: function (data) {
                        toastr.success("Menu item successfully removed!", "WELL DONE");
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
    
                targetLi.remove();
            }
        });
    </script>
@endpush
