<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Leads;

class LeadsController extends Controller
{

    public function leadsPage()
    {
        //$leads=Leads::all();
        $leads=Leads::paginate(10);
        return view('Dashboard.Leads.lead',compact('leads'));
    }

    public function leadsAdd()
    {
         $categories = Category::all();
      
        return view('Dashboard.Leads.add',compact('categories'));
    }
    
    public function validateLeadRegister(Request $request)
    {
        $request->validate(
            ['name'=>"required",
            'email'=>"required|email|unique:leads_data,email",
            'phone'=>"required|digits:10",
             'msg'=>"required|max:40",
            'image'=>"required|image|max:2048",
            'category'=>"required|exists:category_files,id"],
            ['name.required'=>"Name is required",
            'email.required'=>"Email is required",
            'email.email'=>"Enter a valid Email",
            'email.unique'=>"Email is already registered enter a new Email",
            'phone.required'=>"Mobile number is required",
            'phone.digits'=>"Enter 10 digit mobile number",
            'msg.required'=>"Mesage is required",
            'msg.max'=>"Messsgae maximium limit is 40 characters",
            'image.required'=>"Image is required",
            'image.image'=>"File should be a image",
            'image.max'=>"Image size should be maximum 2MB",
            'category.required'=>"Category is required",
            'category.exists'=>"selected category is invalid"]
        );


         $imgfile=null;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $imgfile=$file->store('uploads','public');
        }

        Leads::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->phone,
            'image'=>$imgfile,
            'message'=>$request->msg,
            'category_file_id'=>$request->category
        ]);

     

        return redirect()->route('leads.page')->with('success',"New Lead has been added successfully");

    }

    public function leadsEdit($id)
    {
        $leadsedit=Leads::findOrFail($id);
         $categories = Category::all();
        return view('Dashboard.Leads.edit',compact('leadsedit','categories'));
    }

    public function leadsUpdate(Request $request,$id)
    {
        $lead=Leads::findOrFail($id);
        $image=$request->except('image');
        if($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/leads'), $imageName);
            $image['image'] = $imageName;
        }
          $lead->update($image);
        return redirect()->route('leads.page')->with('success',"Leads data have been Modified");
       // return view('Dashboard.Leads.update');
    }
    

    public function leadsDelete($id)
    {
        $lead=Leads::findOrFail($id);
        $lead->delete();
        return redirect()->route('leads.page')->with('success',"Leads data have been terminated");
       // return view('Dashboard.Leads.update');
    }
  
}
