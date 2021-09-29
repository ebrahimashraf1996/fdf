<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainSectionRequest;
use App\Models\MainSectionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainSectionController extends Controller
{
    public function index() {
        $main_section = MainSectionItem::all();
        return view('dashboard.mainSection.index',compact('main_section'));
    }


    public function edit($id)
    {
        $main_section = MainSectionItem::find($id);
        if (!$main_section)
            return redirect()->route('admin.main.section')->with(['error' => 'هذه القسم غير موجود']);

        return view('dashboard.mainSection.edit', compact('main_section'));
    }

    public function update(MainSectionRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $main_section = MainSectionItem::find($id);
            if (!$main_section)
                return redirect()->route('admin.main.section')->with(['error' => 'هذه القسم غير موجود ']);

            DB::beginTransaction();

            // Photo Update
            if ($request->has('photo')) {
                if (str_ends_with($main_section->photo, 'g') ) {
                    deletePhotos($main_section->photo);
                }
                $fileName = uploadImage('mainSection', $request->photo);
                $main_section->update([
                    'photo' => $fileName,
                ]);
            }


            $main_section->update($request->except('_token', 'id', 'photo'));


            DB::commit();
            return redirect()->route('admin.main.section')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.main.section')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }


}
