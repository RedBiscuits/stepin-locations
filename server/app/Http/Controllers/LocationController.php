<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('index', compact('locations'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            // "image" => 'required|image|mimes:jpeg,png,jpg,gif',
            'iframe' => 'required|string',
            'country' => 'required|string',
        ]);

        // $dataToAdd = $request->except(['image']);

        // $image = $request->image;
        // $extension = $image->getClientOriginalExtension();
        // $imageName = time().uniqid().'.'.$extension;
        // $image->storeAs("public/images/iframes", $imageName);
        // $dataToAdd['image'] = "storage/images/iframes/".$imageName;

        Location::create($request->post());

        return redirect()->route('location.index');

    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('edit', compact('location'));
    }

    public function update(Request $request, $id)
    {

        $Iframe = Location::findorFail($id);

        $request->validate([
            'name' => 'required|string',
            // "image" => 'image|mimes:jpeg,png,jpg,gif',
            'iframe' => 'required|string',
            'country' => 'required|string',
        ]);

        // $dataToAdd = $request->except(['image']);

        // if($request->hasFile('image')){

        //     if (File::exists($Iframe->image)) {
        //         File::delete($Iframe->image);
        //     }

        //     $image = $request->image;
        //     $extension = $image->getClientOriginalExtension();
        //     $imageName = time().uniqid().'.'.$extension;
        //     $image->storeAs("public/images/iframes", $imageName);
        //     $dataToAdd['image'] = "storage/images/iframes/".$imageName;

        // }

        $Iframe->update($request->post());

        session()->flash('message', __('updated'));

        return redirect('location');

    }

    public function destroy(Request $request, $id)
    {

        $location = Location::findOrFail($id);

        if (File::exists($location->image)) {
            File::delete($location->image);
        }

        $location->delete();

        session()->flash('message', __('deleted'));

        return redirect()->back();

    }

    public function aiSearch(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->post('query');
        
        $query = strtolower($query);
        
        if (str_contains($query, 'dubai')) {

            $locations = Location::where('country', 'Dubai')->inRandomOrder()->first();

        } elseif (str_contains($query, 'tunisia')) {

            $locations = Location::where('country', 'Tunisia')->inRandomOrder()->first();

        } elseif (str_contains($query, 'saudi')) {

            $locations = Location::where('country', 'Saudi Arabia')->inRandomOrder()->first();

        } else {

            $locations = Location::inRandomOrder()->first();

        }

        return $locations;
    }
}
