<?php

namespace App\Http\Controllers;

use App\Models\mh_esubmit_profiles;
use App\Models\mh_journals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {

            //= mh_esubmit_profiles::latest()->get();

            $data = DB::table('mh_esubmit_profiles')
            ->join('mh_journals', 'mh_esubmit_profiles.journalID', '=', 'mh_journals.id')
            ->select('mh_esubmit_profiles.*', 'mh_journals.name as journalName')
            ->orderBy('mh_esubmit_profiles.id', 'DESC')
            ->get();

            // $data = DB::table('mh_esubmit_profiles')
            // ->join('mh_companies', 'mh_esubmit_profiles.companyID', '=', 'mh_companies.id')
            // ->select('mh_esubmit_profiles.*', 'mh_journals.name as CompanyName')
            // ->orderBy('mh_esubmit_profiles.id', 'DESC')
            // ->get();



            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('email'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['email'], $request->get('email')) ? true : false;
                        });
                    }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['email']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            }

                            return false;
                        });
                    }
                })
                ->addColumn('action', function ($row) {

                    //     $btn = '<a   href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="View"  class="btn btn-primary btn-sm view" style="margin-right:6px">View</a>'; 

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-secondary btn-sm editProduct" >Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';



                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('admin.users');


        //     if ($request->ajax()) {
        //         $data = mh_esubmit_profiles::all();
        //        return DataTables::of($data)
        //            ->addIndexColumn()
        //            ->addColumn('action', function ($row) {


        //           //     $btn = '<a   href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="View"  class="btn btn-primary btn-sm view" style="margin-right:6px">View</a>'; 

        //                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-secondary btn-sm editProduct" >Edit</a>';

        //                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';



        //                return $btn;
        //            })
        //            ->rawColumns(['action'])
        //            ->make(true);

        // }


        // return view('admin.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        mh_esubmit_profiles::updateOrCreate(
            ['id' => $request->product_id],
            [
                'name' => $request->name,


                'email' => $request->email,
                'password' => bcrypt(request()->get('password')),
            ]
        );




        return redirect()->to('/admin/users')
            ->with('success', 'Create new user successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = mh_esubmit_profiles::find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {




        $user = mh_esubmit_profiles::findOrFail($id);
        $user->delete();


        return redirect()->to('/admin/users')
            ->with('success', 'User delete Successfully!');
    }
}
