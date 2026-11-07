<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pixel;

class FacebookPixelController extends Controller
{
    public function pixeladd(){
    	 $pixel = Pixel::first();
    return view('admin.facebook.pixel', compact('pixel'));
  }


  // pixel store
//    public function pixelStore(Request $request){
//     $request->validate([
//         'facebook_pixel_id' => [
//             'nullable',
//             'regex:/^[0-9]{5,30}$/',
//         ],
//     ]);

//     Pixel::updateOrCreate(
//         ['id' => 1],
//         [
//             'facebook_pixel_id' => $request->facebook_pixel_id,
//             'facebook_pixel_enabled' =>
//                 $request->boolean('facebook_pixel_enabled'),
//         ]
//     );

//     return back()->with(
//         'success',
//         'Facebook Pixel settings saved successfully!'
//     );
// }

     public function pixelstore(Request $request){
        $request->validate([
            'facebook_pixel_id' => 'nullable|string|max:50',
            'facebook_access_token' => 'nullable|string',
            'test_event_code' => 'nullable|string|max:100',
        ]);

        Pixel::updateOrCreate(
            ['id' => 1],
            [
                'facebook_pixel_id' => $request->facebook_pixel_id,
                'facebook_access_token' => $request->facebook_access_token,
                'facebook_pixel_enabled' => $request->has('facebook_pixel_enabled'),
                'conversions_api_enabled' => $request->has('conversions_api_enabled'),
                'test_event_code' => $request->test_event_code,
            ]
        );

        return back()->with('success', 'Facebook Pixel Settings Updated!');
    }
   
   

}




