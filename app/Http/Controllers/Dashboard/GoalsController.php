<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalPhotoRequest;
use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use App\Models\GoalPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoalsController extends Controller
{

    public function index()
    {
        $goals = Goal::all();

        return view('dashboard.goalSection.index', compact('goals'));
    }

    public function create()
    {
        return view('dashboard.goalSection.create');
    }

    public function store(GoalRequest $request)
    {
        // validation by GoalRequest

        try {

            DB::beginTransaction();

            Goal::create($request->except('id','_token'));
            DB::commit();
            return redirect()->route('admin.goal.section')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.goal.section')->with(['error' => 'حدث خطأ ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($id)
    {
        $goal = Goal::find($id);
        if (!$goal)
            return redirect()->route('admin.goal.section')->with(['error' => 'هذه القسم غير موجود']);

        return view('dashboard.goalSection.edit', compact('goal'));
    }

    public function update(GoalRequest $request, $id)
    {
        try {
            // validation by Large Sections Update Request

            //Update DB

            $goal = Goal::find($id);
            if (!$goal)
                return redirect()->route('admin.goal.section')->with(['error' => 'هذه القسم غير موجود ']);

            DB::beginTransaction();


            $goal->update($request->except('_token', 'id'));


            DB::commit();
            return redirect()->route('admin.goal.section')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.goal.section')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

    public function destroy($id)
    {
        try {
            //get specific Image
            $goal = Goal::find($id);

            // check if exists
            if (!$goal)
                return redirect()->route('admin.goal.section')->with(['error' => 'هذا القسم غير موجود ']);

            // delete row from Table
            $goal->delete();

            // redirect success
            return redirect()->route('admin.goal.section')->with(['success' => 'تم الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.goal.section')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $goal = Goal::find($id);

            if (!$goal) {
                return redirect()->route('admin.goal.section')->with(['error' => 'هذه القسم غير موجود']);
            }
            $status = $goal->is_active;

            changeSts($status, $goal);

            return redirect()->route('admin.goal.section')->with(['success' => 'تم تغيير حالة القسم بنجاح']);

        } catch (\Exception $exception) {
            return redirect()->route('admin.goal.section')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

    public function photoIndex() {
        $goalPhoto = GoalPhoto::all();
        return view('dashboard.goalSectionPhoto.index',compact('goalPhoto'));

    }


    public function photoEdit($id)
    {
        $goalPhoto = GoalPhoto::find($id);
        if (!$goalPhoto)
            return redirect()->route('admin.goal.photo.section')->with(['error' => 'هذه الصورة غير موجود']);

        return view('dashboard.goalSectionPhoto.edit', compact('goalPhoto'));
    }

    public function photoUpdate(GoalPhotoRequest $request, $id)
    {


        try {
            // validation by Main Section Request

            //Update DB

            $goalPhoto = GoalPhoto::find($id);
            if (!$goalPhoto)
                return redirect()->route('admin.goal.photo.section')->with(['error' => 'هذه الصورة غير موجود ']);

            DB::beginTransaction();

            // Photo Update
            if ($request->has('photo')) {
                if (str_ends_with($goalPhoto->photo, 'g') ) {
                    deletePhotos($goalPhoto->photo);
                }
                $fileName = uploadImage('goal', $request->photo);
                $goalPhoto->update([
                    'photo' => $fileName,
                ]);
            }


            $goalPhoto->update($request->except('_token', 'id', 'photo'));


            DB::commit();
            return redirect()->route('admin.goal.photo.section')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.goal.photo.section')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }

}
