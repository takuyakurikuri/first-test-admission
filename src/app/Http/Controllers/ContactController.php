<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function register(){
        return view('register');
    }

    public function confirm(ContactRequest $request){ //セッションを使わない場合の処理
        $category = Category::find($request->category_id);
        $contact = $request->only(['first_name','last_name','gender','email','address','building','detail']);
        $tel = $request->input('tel',[]);
        return view('confirm',compact('contact','category','tel'));
    }

    public function store(ContactRequest $request){
        $contact = $request->only('category_id','first_name','last_name','gender','email','address','building','detail');
        $tel = implode('',$request->input('tel',[]));
        $contact = array_merge($contact,['tel' =>$tel]);
        Contact::create($contact);
        return view('thanks');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $category_id = $request->input('category_id');
        $date = $request->input('date');
        $contacts = contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategoryIdSearch($request->category_id)->DateSearch($request->date)->paginate(7)->appends([
            'keyword'=>$keyword,
            'gender'=>$gender,
            'category_id'=>$category_id,
            'date'=>$date
        ]);
        $categories = Category::all();
        return view('admin',compact('contacts','categories'));
    }

    public function destroy(Request $request){
        contact::find($request->id)->delete();
        return redirect('/admin')->with('message','問い合わせを削除しました');

    }
}