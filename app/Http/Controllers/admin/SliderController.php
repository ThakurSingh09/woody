<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

class SliderController extends Controller
{
    //Function for get all slider lists
    public function all_slider_lists(){
    $get_slider_lists = Slider::Orderby('id', 'DESC')->get();
        return view('admin.slider.all-sliders', compact('get_slider_lists'));
    }

    //Function for add slider
    public function add_slider(){
        return view('admin.slider.add-new-slider');
    }

    //Function for submit slider
    public function submit_slider(Request $request){
        //Check if image is exit or not
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/admin/sliders'), $filename);   
        }
        //create slider
        $create_slider = Slider::create([
            'name' =>$request->name,
            'short_desc' =>$request->short_desc,
            'long_desc' =>$request->long_desc,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'status' =>$request->status,
        ]);
        //check if slider create or not
        if($create_slider){
            return back()->with('success', 'Slider created successfully..');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong..');
        }
    }
    
    //Function for edit slider
    public function edit_slider($id){
    $sliders = Slider::find($id);
        return view('admin.slider.edit-slider', compact('sliders'));
    }
    
    //Function for delete attach image slider
    public function delete_attach($id){
        //get sliders
        $sliders = Slider::find($id);
        //get image path
        $imagepath = public_path('uploads/admin/sliders/' .$sliders->image);
        //check if image exit or not folder
        if(file_exists($imagepath) && is_file($imagepath)){
            unlink($imagepath);
            return back()->with('success', 'Image deleted successfully..');
        }
    }

    //Function for update 
    public function update_slider(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get sliders
            $sliders = Slider::find($id);
            //get imagepath
            $imagepath = public_path('uploads/admin/sliders/' .$sliders->image);
            //if check image is exist or not folder
            if(file_exists($imagepath) && is_file($imagepath)){
                //delete image folder
                unlink($imagepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/admin/sliders'), $filename);        
            //update with image
            $update_slider = Slider::where('id', $id)->update([
                'name' =>$request->name,
                'short_desc' =>$request->short_desc,
                'long_desc' =>$request->long_desc,
                'start_date' =>$request->start_date,
                'end_date' =>$request->end_date,
                'status' =>$request->status,
                'image' =>$filename,
            ]);
            //check if slider update or not
            if($update_slider){
                return back()->with('success', 'Slider updated successfully..');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong..');
            }
        } else {
                //update slider without image
                $update_slider = Slider::where('id', $id)->update([
                    'name' =>$request->name,
                    'short_desc' =>$request->short_desc,
                    'long_desc' =>$request->long_desc,
                    'start_date' =>$request->start_date,
                    'end_date' =>$request->end_date,
                    'status' =>$request->status,
                ]);
                //check if slider update or not
                if($update_slider){
                    return back()->with('success', 'Slider updated successfully..');
                } else {
                    return back()->with('unsuccess', 'Opps something went wrong..');
                }
        }
    }

    //Function for delete
    public function delete_slider($id){
    //get slider
    $sliders = Slider::find($id);
    //get imagepath
    $imagepath = public_path('uploads/admin/sliders/' .$sliders->image);
        //check if image is exist or not folder
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete image folder
            unlink($imagepath);
            return back()->with('success', 'Slider deleted successfully..');
        } else {
            $sliders->delete();
            return back()->with('unsuccess', 'Slider deleted successfully..');
        }
    }
}
