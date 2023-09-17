<?php

namespace App\Http\Controllers\Back;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\DataTables\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class MenuController extends Controller
{
    public function index(MenuDataTable $dataTable)
    {
        return $dataTable->render('back.menu.index');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'label' => 'required|max:255|unique:menus'
            ],
            [
                'label.required' => 'Name field is required',
            ]
        );

        $menu = new Menu();
        $menu->label = $request->label;
        $menu->status = $request->status;
        $menu->slug = Str::slug($request->label);

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu added successfully');
    }

    public function delete(Request $request)
    {
        $menu = Menu::whereId($request->id)->firstOrFail();
        $menu_items = MenuItem::where('menu_id', $menu->id)->get();
        foreach ($menu_items as $item) {
            $item->delete();
        }
        $menu->delete();
    }

    //
    // ********** Menu Item ************
    //

    public function menuItem($slug)
    {
        $menu_id = Menu::where('slug', $slug)->firstOrFail()->id;
        $menu_items = MenuItem::where('p_id', 0)
            ->where('menu_id', $menu_id)
            ->orderBy('position')
            ->with('childMenuItem')
            ->get();

        if (MenuItem::where('menu_id', $menu_id)->first()) {
            $menu_set_location = MenuItem::where('menu_id', $menu_id)->first()->set_location;
        } else {
            $menu_set_location = null;
        }

        $categories = BlogCategory::all();

        $menu_position = Menu::where('slug', $slug)->firstOrFail()->id;

        $menu = Menu::where('slug', $slug)->firstOrFail();

        return view('back.menu.menu_edit', compact('menu_id', 'menu', 'menu_items', 'menu_set_location', 'categories'));
    }

    // public function menuItemStore(Request $request)
    // {
    //     return $request;
    //     // MenuItem::truncate();

    //     $request->validate([
    //         'set_location' => 'required',
    //     ]);

    //     $finalArray = array();
    //     $menu_id = $request->menu_id;
    //     $menu_items = MenuItem::where('menu_id', $menu_id)->get();
    //     $set_location = $request->set_location;

    //     foreach ($menu_items as $single_item) {
    //         $single_item->delete();
    //     }

    //     if (language_status() == 1) {
    //         foreach ($request->data as $item) {
    //             array_push($finalArray, array(
    //                 'menu_id' => $menu_id,

    //                 'label_pl' => $item['label_pl'],
    //                 'label_sl' => $item['label_pl'],

    //                 'slug_pl' => Str::slug($item['label_pl']),
    //                 'slug_sl' => Str::slug($item['label_pl']),

    //                 'p_id' => $item['p_id'],
    //                 'position' => $item['position'],
    //                 'icon' => $item['icon'],
    //                 'class' => $item['class'],
    //                 'target' => $item['target'],
    //                 'set_location' => $set_location,
    //                 'created_at' => Carbon::now(),
    //             ));
    //         }
    //     } else {
    //         foreach ($request->data as $item) {
    //             array_push($finalArray, array(
    //                 'menu_id' => $menu_id,

    //                 'label_pl' => $item['label_pl'],
    //                 'label_sl' => $item['label_sl'],

    //                 'slug_pl' => Str::slug($item['label_pl']),
    //                 'slug_sl' => Str::slug($item['label_sl']),

    //                 'p_id' => $item['p_id'],
    //                 'position' => $item['position'],
    //                 'icon' => $item['icon'],
    //                 'class' => $item['class'],
    //                 'target' => $item['target'],
    //                 'set_location' => $set_location,
    //                 'created_at' => Carbon::now(),
    //             ));
    //         }
    //     }

    //     MenuItem::insert($finalArray);
    // }

    // Main menu update;
    public function update(Request $request, $id)
    {

        $menu = Menu::where('id', $id)->firstOrFail();
        $menu->label = $request->label;
        $menu->status = $request->status;

        $menu->save();

        return redirect()->back()->with('success', 'Menu updated successfully');
    }


    // Add item from ajax;
    public function addItem(Request $request)
    {
        $menu_item = new MenuItem();
        $menu_item->label = $request->liLabel;
        $menu_item->menu_id = $request->liMenuId;
        $menu_item->slug = $request->liUrl;
        $menu_item->position = '999';
        $menu_item->target = '_blank';
        $menu_item->status = STATUS_ACTIVE;
        $menu_item->save();

        return $menu_item;
    }

    // Update updated menu;
    public function menuItemUpdate(Request $request)
    {
        $formData = $request->data;
        foreach ($formData as $data) {
            $menu_item = MenuItem::where('id', $data['id'])->first();
            if (!$menu_item) {
                $menu_item = new MenuItem();
            }

            $menu_item->class = $data['class'];
            $menu_item->label = $data['label'];
            $menu_item->menu_id = $data['menu_id'];
            $menu_item->p_id = $data['p_id'];
            $menu_item->position = $data['position'];
            $menu_item->set_location = $data['set_location'];
            $menu_item->slug = $data['slug'];
            $menu_item->target = $data['target'];

            $menu_item->save();
        }
        return $formData;
    }

    public function menuItemDelete(Request $request)
    {
        $menuItem = MenuItem::where('id', $request->id)->firstOrFail();
        $menuItem->delete();
    }
}
