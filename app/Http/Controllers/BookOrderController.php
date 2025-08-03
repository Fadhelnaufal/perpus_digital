<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Books;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = BookOrder::with('book')->where('user_id', $user->id)->latest()->get();

        if ($user->hasRole('student')) {
            return view('students.book-orders.index', compact('orders'));
        } elseif ($user->hasRole('teacher')) {
            return view('teachers.book-orders.index', compact('orders'));
        }

        abort(403);
    }

    public function createBookOrder()
    {
        $books = Books::all();
        $user = Auth::user();

        if ($user->hasRole('student')) {
            return view('students.book-orders.create', compact('books'));
        } elseif ($user->hasRole('teacher')) {
            return view('teachers.book-orders.create', compact('books'));
        }

        abort(403);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_books' => 'required|exists:books,code',
            'order_date' => 'required|date',
            'return_date' => 'required|date|after:order_date',
        ]);

        $book = Books::where('code', $request->code_books)->firstOrFail();

        $order = new BookOrder();
        $order->user_id = Auth::id(); // ✅ Ganti ke user_id universal
        $order->code_books = $book->code; // asumsikan field `code_books` menyimpan kode buku, bukan ID int
        $order->qty_books = 1;
        $order->id_books_class = $book->id_book_class;
        $order->order_date = $request->order_date;
        $order->return_date = $request->return_date;
        $order->period = Carbon::parse($request->order_date)->diffInDays($request->return_date);
        $order->id_penalty = null;
        $order->approve_by = null;

        $order->save();

        return redirect()
            ->route(Auth::user()->hasRole('student') ? 'student.book-orders.index' : 'teacher.book-orders.index')
            ->with('success', 'Peminjaman berhasil diajukan.');
    }
}
