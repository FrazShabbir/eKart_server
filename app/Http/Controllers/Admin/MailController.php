<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = Chat::with('user')->get()->groupBy('user_id');
        $users = User::where('id', '!=', Auth::user()->id)->get();
        // dd($users);
        return view('admin.mailsystem.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $message = Chat::create([
            'user_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'is_read' => 0,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message has been sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sender = User::find($id);
        $users = User::where('id', '!=', Auth::user()->id)->get();
        
        // $chats = Chat::where('receiver_id', $id)->get();
        $chats = Chat::with('user')->where('receiver_id', $id)->orWhere('user_id', $id)->get();

        foreach ($chats as $chat) {
            if ($chat->is_read == 0 && $chat->user_id != Auth::user()->id) {
                $chat->update([
                    'is_read' => 1,
                ]);
            }
        }

        return view('admin.mailsystem.show')
            ->with('sender', $sender)
            ->with('chats', $chats)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
