<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news_page()
    {
        return view('news', ['news' => News::all()->sortByDesc('created_at')]);
    }


    public function panel_edit()
    {
        return view('admin-panel.show-news', ['news'=>News::all()->sortBy('created_at')]);
    }


    public function panel_add_news(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $data['created_at'] = Carbon::now();

        DB::table('news')->insert($data);
        return redirect()->route('panel-news');
    }

    public function edit(News $news)
    {
        return view('admin-panel.edit-news', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->all();
        unset($data['_token']);

        DB::table('news')->where('id', $news->id)
            ->update($data);
        return redirect()->route('panel-news');
    }
    public function destroy(News $news)
    {
        $news->delete();
//        dd($news->delete());
        return redirect()->route('panel-news');
    }
}
