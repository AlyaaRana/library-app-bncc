<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_code' => 'nullable|unique:members,member_code',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'required|date'
        ]);

        $data = $request->all();

        // Generate member_code if not provided
        if (empty($data['member_code'])) {
            $lastMember = Member::orderBy('id', 'desc')->first();
            $nextId = $lastMember ? $lastMember->id + 1 : 1;
            $data['member_code'] = 'MEM-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        }

        Member::create($data);
        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'member_code' => 'required|unique:members,member_code,' . $member->id,
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'required|date'
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $activeBorrowings = $member->borrowings()->where('status', 'borrowed')->count();

        if ($activeBorrowings > 0) {
            return redirect()->back()->with('error', 'Anggota tidak bisa dihapus karena masih memiliki peminjaman aktif.');
        }

        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
