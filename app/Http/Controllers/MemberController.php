<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Member::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
        ]);

        $member = Member::create($request->all());

        return response()->json([
            'message' => 'Member created',
            'data' => $member
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
        $member->update($request->all());

        return response()->json([
            'message' => 'Member updated',
            'data' => $member
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
        $member->delete();

        return response()->json([
            'message' => 'Member deleted'
        ]);
    }
}
