<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function IndexPage()
  {
    $data = [
      'books' => Books::all(),
    ];
    return view('customer.index')->with($data);
  }
  //Kitabı talep et 
  public function borrowBook(Request $request)
  {

    if (Books::where("id", $request->book_id)->first()->stock > 0) {
      Books::where("id", $request->book_id)->first()->update([
        'stock' => Books::where("id", $request->book_id)->first()->stock - 1,
      ]);
      $data = [

        'user_id' => Auth::user()->id,
        'book_id' => $request->book_id,

      ];
      $AddedBooksAndUser = UserBook::create($data);
      if ($AddedBooksAndUser) {
        return redirect()->back()->with('success', 'Kitabınız başarıyla talep edildi.  Onay Bekleniyor...');
      } else {
        return redirect()->back()->with('error', 'Kitabınız talep edilirken bir sorun oluştu.');
      }
    } else {
      return redirect()->back()->with('error', 'Kitabın Stoğu yok maalesef ');
    }
  }

  //kitaplarım 
  public function myBooksPage()
  {
    $data = [
      'userbooks' => UserBook::where("user_id",Auth::user()->id)->get(),
    ];
    return view('customer.kitaplarim')->with($data);

    // $user = User::find(1); 
    // $books = $user->getBooks;

    // foreach ($books as $book) {
    //   echo "Kitap Adı: " . $book->title . "\n";
    //   echo "Yazar: " . $book->author . "\n";
    // }
  }
}
