<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommitmentRequest;
use App\Models\Commitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitmentController extends Controller
{

    public function index() {
        $commits = Commitment::all();

        return view('dashboard.commit.index',compact('commits'));
    }


    public function edit($id)
    {
        $commit = Commitment::find($id);
        if (!$commit)
            return redirect()->route('admin.commit')->with(['error' => 'هذا العنصر غير موجود']);

        return view('dashboard.commit.edit', compact('commit'));
    }

    public function update(CommitmentRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $commit = Commitment::find($id);
            if (!$commit)
                return redirect()->route('admin.commit')->with(['error' => 'هذا العنصر غير موجود ']);

            DB::beginTransaction();



            $commit->update($request->except('_token', 'id'));


            DB::commit();
            return redirect()->route('admin.commit')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.commit')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

}
