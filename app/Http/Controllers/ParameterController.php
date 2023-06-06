<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use DB;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
//    public function index()
//    {
//        $parameters = DB::table('parameters')->select('end_date_order','id')->get();
//        return view('/test', ['parameters' => $parameters]);
//    }
//
//
////New parameter
//  public function store(Request $request)
//  {
//    $request->validate([
//      'end_date_order' => 'required',
//    ]);
//
//    Parameter::create($request->all());
//
//    return redirect()->route('parameter.index');
//  }
//
////DELETE PARAMETER
//    public function destroy(Request $request)
//    {
//        $parameter = Parameter::findOrFail($request->input('parameter_id'));
//        $parameter->delete();
//        return redirect()->route('parameter.index');
//    }
//
//    public function update(Request $request)
//    {
//        $parameter = Parameter::findOrFail($request->input('parameter_id'));
//        $parameter->end_date_order = $request->input('end_date_order');
//        $parameter->save();
//        return redirect()->route('parameter.index');
//    }
}
