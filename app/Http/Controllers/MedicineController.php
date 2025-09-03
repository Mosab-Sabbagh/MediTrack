<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Medicine;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pharmaceutical.index');
    }

    // ترجع الادوية 
    public function medications(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $medicines = Medicine::where('name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $medicines = Medicine::all();
        }

        return view('pharmaceutical.medications', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // add the medicine (treatment) 
        return view('pharmaceutical.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // التحقق من صحة البيانات المرسلة من النموذج
            $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
                'expiry_date' => 'required|date',
                'status' => 'required|string',
            ], [
                'name.required' => 'اسم العلاج مطلوب',
                'name.string' => 'يجب أن يكون الاسم نصاً',
                'quantity.required' => 'الكمية مطلوبة',
                'quantity.integer' => 'يجب أن تكون الكمية رقماً صحيحاً',
                'price.required' => 'السعر مطلوب',
                'price.numeric' => 'يجب أن يكون السعر رقماً',
                'expiry_date.required' => 'تاريخ الانتهاء مطلوب',
                'expiry_date.date' => 'يجب أن يكون على شكل تاريخ',
                'status.required' => 'الحالة مطلوبة',
                'status.string' => 'يجب أن تكون الحالة نصاً',
            ]);

            // إنشاء سجل دواء جديد في قاعدة البيانات
            Medicine::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'expiry_date' => $request->expiry_date,
                'status' => $request->status,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('medications')->with('success', 'تم إضافة الدواء بنجاح.');
        } catch (ValidationException $e) {
            // التعامل مع أخطاء التحقق وإعادة التوجيه مع رسائل الخطأ
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $medicine = Medicine::findOrFail($id);
            return view('pharmaceutical.edit', compact('medicine'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('medications')->with('error', 'الدواء غير موجود.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
                'expiry_date' => 'required|date',
                'status' => 'required|string',
            ], [
                'name.required' => 'اسم العلاج مطلوب',
                'name.string' => 'يجب أن يكون الاسم نصاً',
                'quantity.required' => 'الكمية مطلوبة',
                'quantity.integer' => 'يجب أن تكون الكمية رقماً صحيحاً',
                'price.required' => 'السعر مطلوب',
                'price.numeric' => 'يجب أن يكون السعر رقماً',
                'expiry_date.required' => 'تاريخ الانتهاء مطلوب',
                'expiry_date.date' => 'يجب أن يكون على شكل تاريخ',
                'status.required' => 'الحالة مطلوبة',
                'status.string' => 'يجب أن تكون الحالة نصاً',
            ]);

            $medicine = Medicine::findOrFail($id);
            $medicine->update([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'expiry_date' => $request->expiry_date,
                'status' => $request->status,
            ]);

            return redirect()->route('medications')->with('success', 'تم تحديث الدواء بنجاح.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Medicine::findOrFail($id)->delete();
            return redirect()->route('medications')->with('success', 'تم حذف الدواء بنجاح.');
        } catch (\Exception $e) {
            return redirect()->route('medications')->with('error', 'الدواء غير موجود.');
        }
    }
}
