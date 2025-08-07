<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function index()
    {
        // عرض الاقتراحات للأدمن
        $suggestions = Suggestion::with('user')->latest()->get();
        return view('admin.suggestions.index', compact('suggestions'));
    }

    public function create()
    {
    return view('suggestions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        Suggestion::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'تم إرسال اقتراحك بنجاح!');
    }

    public function destroy($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();

        return redirect()->route('admin.suggestions')->with('success', 'تم حذف الاقتراح');
    }
}