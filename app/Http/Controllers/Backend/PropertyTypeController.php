<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend.type.allType', compact('types'));
    }

    public function AddType()
    {
        return view('backend.type.addType');
    }

    public function StoreType(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:20',
            'type_icon' => 'required'
        ]);

        PropertyType::create([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

    public function EditType(int $id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.editType', compact('types'));
    }

    public function UpdateType(Request $request)
    {
        $pid=$request->id;
        PropertyType::findOrFail($pid)->update
        ([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }
    public function DeleteType($id)  {
        PropertyType::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.type')->with($notification);
    }

}
