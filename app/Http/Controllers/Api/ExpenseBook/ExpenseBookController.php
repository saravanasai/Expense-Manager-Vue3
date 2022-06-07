<?php

namespace App\Http\Controllers\Api\ExpenseBook;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseBook\ExpenseBookResource;
use App\Models\ExpenseBook\ExpenseBook;
use App\Models\ExpenseBook\ExpenseBookShared;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ExpenseBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $expense_book = Cache::rememberForever("expenseBook_" . $request->user()->id, function () {


            $shared_expense_books=ExpenseBookShared::where('to_user_id',request()->user()->id)->pluck('shared_book_id');

            return ExpenseBook::whereIn('id',$shared_expense_books)->get();
        });

        return ExpenseBookResource::collection($expense_book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book_name' => ['required'],
            'book_description' => ['sometimes'],
        ]);

        $is_stored = ExpenseBook::create($request->all());

        $is_stored = ExpenseBookShared::create(
            [
                "to_user_id" => auth()->user()->id,
                "shared_book_id" => $is_stored->id
            ]

        );

        return $is_stored
            ? response()->json(['message' => 'New Book Created', 'data' => $request->all()], 201)
            : response()->json(['message' => 'something went wrong'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $expense_book = ExpenseBook::find($id);

        return ExpenseBookResource::make($expense_book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'book_name' => ['required'],
            'book_description' => ['sometimes'],
        ]);

        $is_updated = ExpenseBook::find($id)->update($request->all());

        return $is_updated
            ? response()->json(['message' => 'updated', 'data' => $request->all()], 200)
            : response()->json(['message' => 'something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseBook::destroy($id);

        return response()->noContent();
    }




    public function shareBook(Request $request, $id)
    {

        $user = User::where('email', $request->email)->first();

        //checking the if already the user exist
        if ($user) {
            $data = [
                "to_user_id" => $user->id,
                "shared_book_id" => $id,
            ];

            //checking  if the expense Book already  shared to the user
            $is_shared = ExpenseBookShared::firstOrCreate(
                [
                    "to_user_id" => $user->id,
                    "shared_book_id" => $id
                ],
                $data
            );

            return $is_shared
                ? response()->json(['message' => 'Shared', 'data' => $request->all()], 200)
                : response()->json(['message' => 'something went wrong'], 500);
        }

        return response()->json(['message' => 'User Not Found'], 404);
    }
}
