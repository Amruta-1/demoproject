<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\address;
use Illuminate\Http\Request;
use DB;
use Auth;

class addressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $address = address::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address1', 'LIKE', "%$keyword%")
                ->orWhere('address2', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('zipcode', 'LIKE', "%$keyword%")
                ->orWhere('mobno', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $address  = DB::table('addresses')
        ->join('country', 'addresses.countryID', '=', 'country.id')
        ->join('states', 'addresses.stateID', '=', 'states.id')
        ->select('addresses.id','addresses.customername','addresses.address1','addresses.address2','addresses.zipcode','addresses.mobno','country.country_name','states.state_name')
        ->get();
        }

        return view('admin.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = DB::table('country')->get();
        return view('admin.address.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $customerID= Auth::user()->id;
        //dd($customerID);
        $address= new address;
        
        $address->customername=$request->input('name');
        $address->address1=$request->input('address1');
        $address->address2=$request->input('address1');
        $address->countryID=$request->input('country');
        $address->stateID=$request->input('state');
        $address->city=$request->input('city');
        $address->zipcode=$request->input('zipcode');
        $address->mobno=$request->input('mobno');
        $address->customer_id=$customerID;
        $address->save();


        return redirect('admin/address')->with('flash_message', 'address added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $address = address::findOrFail($id);

        return view('admin.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $address = address::findOrFail($id);
        $countries = DB::table('country')->get();
        $states = DB::table('states')->get();
        return view('admin.address.edit', compact('address','countries','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $customername=$request->input('name');
        $address1=$request->input('address1');
        $address2=$request->input('address1');
        $countryID=$request->input('country');
        $stateID=$request->input('state');
        $city=$request->input('city');
        $zipcode=$request->input('zipcode');
        $mobno=$request->input('mobno');
        
        DB::table('addresses')
        ->where('id', $id)  
        ->update(array('customername' => $customername,'address1' =>$address1,'address2' =>$address2,'countryID'=>$countryID,'stateID' =>$stateID,'city'=>$city,'zipcode'=>$zipcode,'mobno'=>$mobno)); 



        return redirect('admin/address')->with('flash_message', 'address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        address::destroy($id);

        return redirect('admin/address')->with('flash_message', 'address deleted!');
    }
    
}
