<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{

    /**
     * Lưu thông tin feedback vào cơ sở dữ liệu.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu gửi lên từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Lưu thông tin feedback vào cơ sở dữ liệu
        Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Trả về thông báo thành công và chuyển hướng về trang liên hệ
        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi lời nhắn!');
    }
}
