<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSectionRequest;
use App\Http\Requests\AboutUsCardRequest;
use App\Models\About;
use App\Models\AboutUsCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{

    public function sectionIndex() {
        $section = About::all();
        return view('dashboard.aboutUsSection.index',compact('section'));
    }


    public function sectionEdit($id)
    {
        $section = About::find($id);
        if (!$section)
            return redirect()->route('admin.about.section')->with(['error' => 'هذه القسم غير موجود']);

        return view('dashboard.aboutUsSection.edit', compact('section'));
    }

    public function sectionUpdate(AboutSectionRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $section = About::find($id);
            if (!$section)
                return redirect()->route('admin.about.section')->with(['error' => 'هذه القسم غير موجود ']);

            DB::beginTransaction();

            // Photo Update
            if ($request->has('photo')) {
                if (str_ends_with($section->photo, 'g') ) {
                    deletePhotos($section->photo);
                }
                $fileName = uploadImage('about', $request->photo);
                $section->update([
                    'photo' => $fileName,
                ]);
            }


            $section->update($request->except('_token', 'id', 'photo'));


            DB::commit();
            return redirect()->route('admin.about.section')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.about.section')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }


    public function cardsIndex() {
        $about_cards = AboutUsCard::all();
        return view('dashboard.aboutUsCards.index',compact('about_cards'));
    }


    public function cardEdit($id)
    {
        $about_card = AboutUsCard::find($id);
        if (!$about_card)
            return redirect()->route('admin.about.cards')->with(['error' => 'هذه القسم غير موجود']);

        return view('dashboard.aboutUsCards.edit', compact('about_card'));
    }

    public function cardUpdate(AboutUsCardRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $about_card = AboutUsCard::find($id);
            if (!$about_card)
                return redirect()->route('admin.about.cards')->with(['error' => 'هذه القسم غير موجود ']);

            DB::beginTransaction();



            $about_card->update($request->except('_token', 'id'));


            DB::commit();
            return redirect()->route('admin.about.cards')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.about.cards')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }


    public function cardChangeStatus($id)
    {
        try {
            $about_card = AboutUsCard::find($id);

            if (!$about_card) {
                return redirect()->route('admin.about.cards')->with(['error' => 'هذه القسم غير موجود']);
            }
            $status = $about_card->is_active;

            changeSts($status, $about_card);

            return redirect()->route('admin.about.cards')->with(['success' => 'تم تغيير حالة القسم بنجاح']);

        } catch (\Exception $exception) {
            return redirect()->route('admin.about.cards')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }
}
