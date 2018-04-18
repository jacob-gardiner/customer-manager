<?php

namespace App\Http\Controllers;

use App\Customer;

use App\Note;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->getCustomers();

        if (request()->wantsJson()) {
            return $customers;
        }

        return View('customers.index', compact('customers'));
    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:customers',

        ]);
    }


    public function createCustomerForm()
    {
        return View('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        Customer::create([
            'name'=> request('name'),
            'phone'=> request('phone'),
            'email'=> request('email'),
            'user_id' => Auth::user()->id
        ]);

        $request->session()->flash('success','Customer Added!');
       return redirect('/customers');
    }


    protected function getCustomers()
    {
        $customers = Customer::where('user_id', '=', Auth::user()->id)->get();

        return $customers;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id,customer $customer)
    {
        $customer = Customer::findOrFail( $id);
        $notes = Note::where('customer_id', '=', $id)->get();

        return View('customers.show', compact('customer', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $customer = Customer::findOrFail( $id);
        $notes = Note::where('customer_id', '=', $id)->get();

        return View('customers.edit', compact('customer', 'notes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $customer = Customer::find($id);
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->phone = request('phone');

        $customer->save();

        return redirect('customers')->with('success', 'The Customer has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, customer $customer)
    {
        \Session::flash('danger','Customer Deleted');
        DB::table('customers')->where('id', '=', $id)->delete();

        return redirect('/');
    }
}
