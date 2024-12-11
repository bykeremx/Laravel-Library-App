<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Publishing;
use App\Models\UserBook;
use Illuminate\Http\Request;

class AdminKitapController extends Controller
{
    public function DeleteBookId($id)
    {
        $kitap_var_mi = Books::where("id", $id)->first();
        if ($kitap_var_mi) {
            $kitap_var_mi->delete();
            UserBook::where("book_id", $id)->delete();
            return redirect()->route("admin-index-page")->with('success', 'Kitap başarıyla silindi.');
        } else {
            return redirect()->route("admin-index-page")->with('error', 'Böyle bir kitap bulunamadı.');
        }
    }
    //kitap ekleme 
    public function AddBookPage()
    {
        $data = [
            "Categories" => Categories::all(),
            "Publishings" => Publishing::all(),
        ];
        return view("Admin.kitapEkle")->with($data);
    }
    //kitabın yüklendiği yani post edildiği fonksiyon 

    public function AddBookPost(Request $request)
    {
        // dd($request->all());
        $newBookDatas = [
            "title" => $request->title,
            "author" => $request->author,
            "stock" => $request->stock,
            "category_id" => $request->category_id,
            "publishing_id" => $request->publishing_id,
            "content" => $request->content,
            "book_img" => null,
        ];

        if ($request->hasFile("book_img")) {
            $image = $request->file("book_img");
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("uploads_book_img"), $imageName);
            $newBookDatas["book_img"] = $imageName;
        }
        if (Books::create($newBookDatas)) {
            return redirect()->route("admin-index-page")->with('success', 'Kitap başarıyla eklendi.');
        } else {
            return redirect()->route("admin-index-page")->with('error', 'Kitap eklenirken bir sorun oluştu.');
        }
    }

    //onay bekleyen kitaplar 

    public function OnayBekleyenKitaplarPage()
    {

        $data = [
            "StatusBook" => UserBook::where("status","0")->get(),
        ];
        return view("Admin.onayBekleyenKitap")->with($data);
    }

    //onay bekleyen kitaplar 

    public function OnaylanmisKitaplar()
    {

        $data = [
            
            "StatusBook" => UserBook::where("status","1")->get(),
        ];
        return view("Admin.onaylanmisKitaplar")->with($data);
    }

    //onayla kitap 
    public function OnaylaKitap($id)
    {
        $onay_kitap = UserBook::where('id', $id)->first();

        // Receive date is current time
        $receiveDate = now();

        // Return date is 14 days from now
        $returnDate = now()->addDays(14);

        if ($onay_kitap->update([
            'status' => "1",
            'receive_date' => $receiveDate,
            'return_date' => $returnDate,
        ])) {
            return redirect()->route("onay-bekleyen-kitaplar")->with('success', 'Kitap başarıyla onaylandı.');
        } else {
            return redirect()->route("onay-bekleyen-kitaplar")->with('error', 'Kitap onaylanırken bir sorun oluştu.');
        }
    }

    //kitap düzenle 
    public function KitapDuzenlePage($id){
        $data = [
            "Categories" => Categories::all(),
            "Publishings" => Publishing::all(),
            "Book" => Books::where("id", $id)->first(),
        ];
        return view("Admin.kitapDuzenle")->with($data);
    }
    //kitap düzenle 
    public function KitapDuzenlePost(Request $request, $id){
        $updateBookDatas = [
            "title" => $request->title,
            "author" => $request->author,
            "stock" => $request->stock,
            "category_id" => $request->category_id,
            "publishing_id" => $request->publishing_id,
            "content" => $request->content,
        ];

        if ($request->hasFile("book_img")) {
            $image = $request->file("book_img");
            $imageName = time(). "_". $image->getClientOriginalName();
            $image->move(public_path("uploads_book_img"), $imageName);
            $updateBookDatas["book_img"] = $imageName;
        }
        if(Books::where("id", $id)->update($updateBookDatas)){
            return redirect()->route("admin-index-page")->with('success', 'Kitap başarıyla düzenlendi.');
        } else {
            return redirect()->route("admin-index-page")->with('error', 'Kitap düzenlenirken bir sorun oluştu.');
        }
    }
}
