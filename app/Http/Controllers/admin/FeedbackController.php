<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::orderByDesc('id')->paginate(10);
        return view('admin.feedback.index',compact('feedbacks'),[
            'title' => 'Danh sách tin nhắn liên hệ'
        ]);
    }
}
