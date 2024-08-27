<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komen;
use App\Models\Like;
use App\Models\Share;

class FeedbackController extends Controller
{
    public function index()
    {
        $commands = Komen::all();
        return view('user.pages.feedback', compact('commands'));
    }

    public function post(Request $request)
    {
        $request->validate([
            'komentar' => ['required', 'string'],
            'pengguna' => ['required'],
        ]);

        $request = Komen::create([
            'komentar' => $request->komentar,
            'id_pengguna' => $request->pengguna,
        ]);

        return redirect()->back();
    }
    public function reply(Request $request)
    {
        $request->validate([
            'parent' => ['integer'],
            'komentar' => ['required', 'string'],
            'pengguna' => ['required'],
        ]);

        $request = Komen::create([
            'parent' => $request->parent,
            'komentar' => $request->komentar,
            'id_pengguna' => $request->pengguna,
        ]);

        return redirect()->back();
    }

    public function like(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_komen' => ['required', 'integer', 'exists:komen,id'], 
            'id_pengguna' => ['required', 'integer', 'exists:pengguna,id'],
        ]);
    
        // Cari like yang sudah ada
        $existingLike = Like::where('id_komen', $request->id_komen)
                            ->where('id_pengguna', $request->id_pengguna)
                            ->first();
    
        if ($existingLike) {
            // Jika sudah ada, hapus like tersebut
            $existingLike->delete();
        } else {
            // Jika belum ada, buat like baru
            Like::create([
                'id_komen' => $request->id_komen,
                'id_pengguna' => $request->id_pengguna,
            ]);
        }
    
        return redirect()->back();
    }
    

    public function share(Request $request)
    {
        $request->validate([
            'id_komen' => ['required'],
            'id_pengguna' => ['required'],
        ]);

        $request = Share::create([
            'id_komen' => $request->id_komen,
            'id_pengguna' => $request->id_pengguna,
        ]);

        return redirect()->back();
    }

    // Controller
    public function showComments($parentId, $padding = 4)
    {
        $comments = Komen::where('parent', $parentId)->get();

        $html = '';
        if ($comments->isNotEmpty()) {
            foreach ($comments as $comment) {
                $html .= '<div class="w-full h-full mb-2 flex flex-col pt-2 pr-2 pl-' . $padding . ' border-2 rounded-xl">';
                $html .= '<span class="font-bold text-lg">' . $comment->pengguna->nama . '</span>';
                $html .= '<p>' . $comment->komentar . '</p>';
                $html .= '<div class="w-full flex justify-end mb-2 pr-4">';
                $html .= '<button class="font-bold" onclick="showReplyForm(' . $comment->id . ')">Reply</button>';
        
                // Form for Like
                $html .= '<form action="' . route('feedback.like') . '" method="POST" class="mx-8">';
                $html .= csrf_field();
                $html .= '<input type="hidden" name="id_komen" value="' . $comment->id . '">';
                $html .= '<input type="hidden" name="id_pengguna" value="' . 2 . '">';
                $total_likes = Like::where('id_komen', $comment->id)->count();
                $html .= '<span class="font-bold mr-2">' . $total_likes . '</span>';
                $html .= '<button type="submit" class="bg-red-500 px-2 py-1 rounded-full text-white font-bold">Like</button>';
                $html .= '</form>';
        
                // Form for Share
                $html .= '<form action="' . route('feedback.share') . '" method="POST">';
                $html .= csrf_field();
                $html .= '<input type="hidden" name="id_komen" value="' . $comment->id . '">';
                $html .= '<input type="hidden" name="id_pengguna" value="' . 2 . '">';
                $total_shares = Share::where('id_komen', $comment->id)->count();
                $html .= '<span class="font-bold mr-2">' . $total_shares . '</span>';
                $html .= '<button type="submit" class="bg-blue-500 px-2 py-1 rounded-full text-white font-bold">Share</button>';
                $html .= '</form>';
        
                $html .= '</div>';
        
                // Form balasan yang tersembunyi
                $html .= '<div id="reply-form-' . $comment->id . '" class="reply-form w-full flex flex-col p-4 border-2 rounded-xl my-2 hidden">';
                $html .= '<form action="' . route('feedback.reply') . '" method="POST">';
                $html .= csrf_field();
                $html .= '<input type="hidden" name="pengguna" value="1">';
                $html .= '<input type="hidden" name="parent" value="' . $comment->id . '">';
                $html .= 'Masukan Komentar Baru';
                $html .= '<textarea name="komentar" cols="30" rows="10" class="w-full h-24 p-4 border-2 rounded-xl mt-2"></textarea>';
                $html .= '<div class="w-full flex justify-end mt-2">';
                $html .= '<button type="submit" class="px-4 py-3 bg-green-500 rounded-xl text-white font-bold">Posting</button>';
                $html .= '</div>';
                $html .= '</form>';
                $html .= '</div>';
        
                // Panggil fungsi rekursif dengan padding yang ditambah
                $html .= $this->showComments($comment->id, $padding + 2);
        
                $html .= '</div>';
            }
        }
        

        return $html;
    }



}
