<!-- From Pages -->
<div class="card collapse-icon accordion-icon-rotate">
    <div id="pages-heading" class="card-header">
        <a data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages" class="card-title lead collapsed">Pages</a>
    </div>
    <div id="pages" role="tabpanel" aria-labelledby="pages-heading" class="collapse add-item" aria-expanded="false">
        <div class="card-content">
            <div class="card-body">
                <div class="border p-1">
                    <ul class="skin skin-flat m-0 p-0 list-unstyled">
                        <li>
                            <fieldset>
                                <input type="checkbox" id="pages-1" />
                                <label data-menu-id="{{ $menu_id }}" data-label="Home" data-slug="{{url('/')}}" for="pages-1">home</label>
                            </fieldset>
                        </li>
                        <li>
                            <fieldset>
                                <input type="checkbox" id="pages-2" />
                                <label data-menu-id="{{ $menu_id }}" data-label="About" data-slug="/about" for="pages-2">about</label>
                            </fieldset>
                        </li>

                        <li>
                            <fieldset>
                                <input type="checkbox" id="pages-3" />
                                <label data-menu-id="{{ $menu_id }}" data-label="Blog" data-slug="{{ route('front.blog') }}" for="pages-3">Blog</label>
                            </fieldset>
                        </li>

                        <li>
                            <fieldset>
                                <input type="checkbox" id="pages-4" />
                                <label data-menu-id="{{ $menu_id }}" data-label="Video" data-slug="{{ route('video.gallery') }}" for="pages-4">Video</label>
                            </fieldset>
                        </li>

                        <li>
                            <fieldset>
                                <input type="checkbox" id="pages-5" />
                                <label data-menu-id="{{ $menu_id }}" data-label="Contact" data-slug="{{ route('contact.page') }}" for="pages-5">Contact</label>
                            </fieldset>
                        </li>

                        <li>
                            <fieldset class="text-right mt-1">
                                <button class="btn btn-primary add-item-to-menu"><i class="ft-plus"></i> Add to menu</button>
                            </fieldset>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- From category -->
<div class="card collapse-icon accordion-icon-rotate">
    <div id="category-heading" class="card-header">
        <a data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category" class="card-title lead collapsed">category</a>
    </div>
    <div id="category" role="tabpanel" aria-labelledby="category-heading" class="collapse add-item" aria-expanded="false">
        <div class="card-content">
            <div class="card-body">
                <div class="border p-1">
                    <ul class="skin skin-flat m-0 p-0 list-unstyled">
                        @foreach ($categories as $category)
                            
                        <li>
                            <fieldset>
                                <input type="checkbox" id="category-{{$category->id}}" />
                                <label data-menu-id="{{ $menu_id }}" data-label="{{ $category->title }}" data-slug="{{ route('blog.by.category', $category->slug) }}" for="category-{{$category->id}}">{{ $category->title }}</label>
                            </fieldset>
                        </li>
                        @endforeach

                        <li>
                            <fieldset class="text-right mt-1">
                                <button class="btn btn-primary add-item-to-menu"><i class="ft-plus"></i> Add to menu</button>
                            </fieldset>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('back.menu.custom_item')

@push('menu_js')
    <script>
        // Add Item from active select item;
        $(".add-item-to-menu").on("click", function () {
            let ddList = $(".dd-list").first();
            let getLiSelect = $(this).parents("ul").first().children("li.active").find("label");
            Array.from(getLiSelect).forEach(function (item) {
                let setData = {
                    liLabel: item.getAttribute("data-label"),
                    liUrl: item.getAttribute("data-slug"),
                    liMenuId: item.getAttribute("data-menu-id"),

                    liClass: item.getAttribute("data-class") ? item.getAttribute("data-class") : null,
                    liPosition: item.getAttribute("data-position") ? item.getAttribute("data-position") : null,
                    liTarget: item.getAttribute("data-target") ? item.getAttribute("data-target") : null,
                };

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
                        if (error.statusText) {
                            toastr.warning("Something wrong! please reload the page", "Sorry");
                        }
                    },
                });
            });
        });
    </script>
@endpush