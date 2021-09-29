<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyUsParaRequest;
use App\Http\Requests\WhyUsRequest;
use App\Models\WhyUsItem;
use App\Models\WhyUsReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhyUsController extends Controller
{

    public function index()
    {
        $why_us = WhyUsReason::all();

        return view('dashboard.WhyUsReasons.index', compact('why_us'));
    }

    public function create()
    {
        return view('dashboard.WhyUsReasons.create');
    }

    public function store(WhyUsRequest $request)
    {
        // validation by Why_us_itemRequest

        try {

            DB::beginTransaction();

            WhyUsReason::create($request->except('id','_token'));

            DB::commit();
            return redirect()->route('admin.why-us.reasons')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.why-us.reasons')->with(['error' => 'حدث خطأ ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($id)
    {
        $Why_us_item = WhyUsReason::find($id);
        if (!$Why_us_item)
            return redirect()->route('admin.why-us.reasons')->with(['error' => 'هذا العنصر غير موجود']);

        return view('dashboard.WhyUsReasons.edit', compact('Why_us_item'));
    }

    public function update(WhyUsRequest $request, $id)
    {
        try {
            // validation by Large Sections Update Request

            //Update DB

            $Why_us_item = WhyUsReason::find($id);
            if (!$Why_us_item)
                return redirect()->route('admin.why-us.reasons')->with(['error' => 'هذا العنصر غير موجود ']);

            DB::beginTransaction();


            $Why_us_item->update($request->except('_token', 'id'));


            DB::commit();
            return redirect()->route('admin.why-us.reasons')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.why-us.reasons')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try {
            //get specific item
            $Why_us_item = WhyUsReason::find($id);

            // check if exists
            if (!$Why_us_item)
                return redirect()->route('admin.why-us.reasons')->with(['error' => 'هذا العنصر غير موجود ']);

            // delete row from Table
            $Why_us_item->delete();

            // redirect success
            return redirect()->route('admin.why-us.reasons')->with(['success' => 'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.why-us.reasons')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $Why_us_item = WhyUsReason::find($id);

            if (!$Why_us_item) {
                return redirect()->route('admin.why-us.reasons')->with(['error' => 'هذا العنصر غير موجود']);
            }
            $status = $Why_us_item->is_active;

            changeSts($status, $Why_us_item);

            return redirect()->route('admin.why-us.reasons')->with(['success' => 'تم تغيير حالة العنصر بنجاح']);

        } catch (\Exception $exception) {
            return redirect()->route('admin.why-us.reasons')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }
    ////////////////////////////

    public function paraIndex() {
        $why_us_p = WhyUsItem::all();
        return view('dashboard.whyUsP.index',compact('why_us_p'));

    }


    public function paraEdit($id)
    {
        $why_us_p = WhyUsItem::find($id);
        if (!$why_us_p)
            return redirect()->route('admin.why-us.para')->with(['error' => 'هذا العنصر غير موجود']);

        return view('dashboard.whyUsP.edit', compact('why_us_p'));
    }

    public function paraUpdate(WhyUsParaRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $why_us_p = WhyUsItem::find($id);
            if (!$why_us_p)
                return redirect()->route('admin.why-us.para')->with(['error' => 'هذا العنصر غير موجود ']);

            DB::beginTransaction();

            $why_us_p->update($request->except('_token', 'id'));


            DB::commit();
            return redirect()->route('admin.why-us.para')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.why-us.para')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

}
