<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Country;
class regionController extends Controller
{
    public function index()
    {
        $regions = Region::get();
        $countries = Country::get();
        return view('admin.region.index',compact('regions','countries'));
    }



    public function create(Request $request){

        $request->validate([
            'region' => 'required',
        ]);

        $region = new Region;

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/region/", $fileNameToStore1);
        }else {

            $fileNameToStore1 = 'no_img.png';
        }


        if ($request->hasFile('imageIcon')) {

            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/region/", $fileNameToStore2);
        }else {

            $fileNameToStore2 = 'no_img.png';
        }


        $region->region  = $request->region;
        $region->imageIcon  = $fileNameToStore2;
        $region->description  = $request->description;
        $region->banner  = $fileNameToStore1;

        if($region->save()){
            return redirect()->back()->with('success', 'Region   Created');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }
    public function createCountry(Request $request)
    {
        $request->validate([
            'region' => 'required',
            'country' => 'required',
        ]);

        $region = new Country;

        if ($request->hasFile('imageIcon')) {

            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/country/", $fileNameToStore1);
        }else {

            $fileNameToStore1 = 'no_img.png';
        }

        $region->region_id  = $request->region;
        $region->country  = $request->country;
        $region->imageIcon  = $fileNameToStore1;
        $region->description  = $request->description;

        if($region->save()){
            return redirect()->back()->with('success', 'Country Created');
        }else{
            return redirect()->back()->with('error', 'Error While Country');
        }



    }

    public function update(Request $request)
    {
        $request->validate([
            'regionId' => 'required',
        ]);

        $regions = Region::where('id',$request->regionId)->first();

        if ($request->hasFile('banner')) {

            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('banner')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('banner')->storeAs("public/data/region/", $fileNameToStore1);
        }else {
            $fileNameToStore1 = $regions->banner;
        }

        if ($request->hasFile('imageIcon')) {
            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore2 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/region/", $fileNameToStore2);
        }else {

            $fileNameToStore2 =  $regions->imageIcon;
        }
        $regions->region  = $request->region;
        $regions->imageIcon  = $fileNameToStore2;
        $regions->description  = $request->description;
        $regions->banner  = $fileNameToStore1;

        if($regions->save()){
            return redirect()->back()->with('success', 'Region   Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Creating');
        }
    }


    public function updateCountry(Request $request)
    {
        $request->validate([
            'countryId' => 'required',
        ]);
        $country = Country::where('id',$request->countryId)->first();

        if ($request->hasFile('imageIcon')) {

            $filenameWithExt = $request->file('imageIcon')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('imageIcon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore1 = $filename . time() . '.' . $extension;
            $path = $request->file('imageIcon')->storeAs("public/data/country/", $fileNameToStore1);
        }else {
            $fileNameToStore1 = $country->imageIcon;
        }


        $country->country  = $request->country;
        $country->imageIcon  = $fileNameToStore1;
        $country->description  = $request->description;

        if($country->save()){
            return redirect()->back()->with('success', 'Country Updated');
        }else{
            return redirect()->back()->with('error', 'Error While Country');
        }
    }

    public function deleteCountry(Request $request)
    {
        $request->validate([
            'countryId' => 'required',
        ]);
        $country = Country::where('id',$request->countryId)->first();
        if($country->delete()){
            return redirect()->back()->with('success', 'Country Deleted');
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'region_id' => 'required',
        ]);
        $region = Region::where('id',$request->region_id)->first();
        if($region->delete()){
            return redirect()->back()->with('success', 'Region Deleted');
        }
    }


}
