<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('dashboard.contactUs.index', compact('contacts'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        if (!$contact)
            return redirect()->route('admin.contact.us')->with(['error' => 'هذا العنصر غير موجود']);

        return view('dashboard.contactUs.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        try {
            // validation by SocialRequest

            //Update DB

            $contact = Contact::find($id);
            if (!$contact)
                return redirect()->route('admin.contact.us')->with(['error' => 'هذا العنصر غير موجود ']);

            DB::beginTransaction();


            $contact->update($request->only('url'));


            DB::commit();
            return redirect()->route('admin.contact.us')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.contact.us')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }


}
