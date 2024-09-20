<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Lấy tất cả thông tin liên hệ từ bảng contacts
        $contacts = Contact::with('classified')->get();
        
        // Trả về view kèm theo danh sách liên hệ
        return view('admin.contacts.index', compact('contacts'));
    }
}
