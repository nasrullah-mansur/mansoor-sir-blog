<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Appearance;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function edit()
    {
        return view('back.appearance.edit');
    }

    public function update(Request $request)
    {

        if (theme()) {
            // Update Appearance;
            $request->validate([
                'theme_name' => 'required',
                'admin_name' => 'required',
                'logo' => 'nullable|mimes:png,jpg',
                'favicon' => 'nullable|mimes:png,jpg'
            ]);

            $app = theme();

            if ($request->hasFile('logo')) {
                $app->logo = ImageUpload($request->logo, LOGO_PATH, $app->logo);
            }

            if ($request->hasFile('favicon')) {
                $app->favicon = ImageUpload($request->favicon, LOGO_PATH, $app->favicon);
            }
        } else {
            // Create Appearance;
            $request->validate([
                'theme_name' => 'required',
                'admin_name' => 'required',
                'logo' => 'required|mimes:png,jpg',
                'favicon' => 'required|mimes:png,jpg',
                'address' => 'required'
            ]);

            $app = new Appearance();
            $app->logo = ImageUpload($request->logo, LOGO_PATH);
            $app->favicon = ImageUpload($request->favicon, LOGO_PATH);
        }

        $app->theme_name = $request->theme_name;
        $app->admin_name = $request->admin_name;
        $app->admin_name = $request->admin_name;
        $app->meta = $request->meta;
        $app->address = $request->address;
        $app->custom_css = $request->custom_css;
        $app->custom_javascript = $request->custom_javascript;
        $app->save();

        return redirect()->back()->with('success', 'Theme info updated successfully');
    }
}
