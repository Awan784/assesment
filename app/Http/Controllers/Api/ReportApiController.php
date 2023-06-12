<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportHasUser;
use Illuminate\Http\Request;
use PDF;
class ReportApiController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $report=Report::latest()->get();
        return  response()->json(['report' => $report]);
    }

    /**
     * Display the specified resource.
     */
    public function get($id)
    {
        $report= Report::findOrFail($id);
        return  response()->json(['report' => $report]);
    }
    public function update(Request $request, string $id)
    {
        $data=$request->except('_token','_method');
        $report= Report::updateOrCreate(['id' => $id],$data);
        ReportHasUser::where('reports_id',$report->id)->delete();
        foreach ($request->profile as $key => $value) {
            $profile=new ReportHasUser();
            $profile->reports_id=$report->id;
            $profile->users_id=$value;
            $profile->save();
        }
        return  response()->json(['success' => "Report Updated Successfully"]);
    }
    public function create(Request $request)
    {
        $data=$request->except('_token','_method');
        $report= Report::updateOrCreate(['id' => 0],$data);

        foreach ($request->profile as $key => $value) {
            $profile=new ReportHasUser();
            $profile->reports_id=$report->id;
            $profile->users_id=$value;
            $profile->save();
        }
        return  response()->json(['success' => "Report Created Successfully"]);
    }
    public function delete($id)
    {
        Report::destroy($id);
        return  response()->json(['success' => "Report Deleted Successfully"]);
    }
    public function createPdf(){
        $data = Report::all();
      // share data to view
      view()->share('report',$data);
      $data=$data->toArray();
      $pdf = PDF::loadView('pdf');
      // download PDF file with download method
     return  response()->json(['file' => $pdf]);
    }
}
