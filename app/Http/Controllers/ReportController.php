<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\ReportHasUser;
use App\Models\User;
use PDF;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report=Report::latest()->get();
        return view('report.index',['report'=>$report]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report= Report::findOrFail($id);
        return view('report.show',['report'=>$report]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if($id==0){
            $report=new Report();
            $profile=User::all();
            return view('report.form',['report'=>$report,'id'=>$id,'profile'=>$profile]);
        }else{

            $report=Report::findOrFail($id);
            $profile=User::all();
            return view('report.form',['report'=>$report,'id'=>$id,'profile'=>$profile]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request);
        $data=$request->except('_token','_method');
        $report= Report::updateOrCreate(['id' => $id],$data);
        ReportHasUser::where('reports_id',$report->id)->delete();
        foreach ($request->profile as $key => $value) {
            $profile=new ReportHasUser();
            $profile->reports_id=$report->id;
            $profile->users_id=$value;
            $profile->save();
        }
        return redirect()->route('report.index')->with('success','Your report is created');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
    public function delete($id)
    {
        Report::destroy($id);
        return redirect()->route('report.index');
    }
    public function pdf(){
        $report=Report::all();
        return view('pdf',['report'=>$report]);
    }
    public function createPdf(){
        $data = Report::all();
      // share data to view
      view()->share('report',$data);
      $data=$data->toArray();
      $pdf = PDF::loadView('pdf');

    //   dd($pdf);
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
}
