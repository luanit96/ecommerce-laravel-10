<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
    public function index() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $sliders = Slider::orderByDesc('created_at')->limit(3)->get();
        $categories = Category::limit(6)->get();
        $newProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $favouriteProducts = Product::orderByDesc('views')->limit(12)->get();
        return view('home.index', compact('sliders', 'categories', 'newProducts', 'favouriteProducts', 'menus', 'listCategory'));
    }

    public function getMenus() {
        $recusive = new MenuRecusive();
        $html = $recusive->renderMenu();
        return $html;
    }

    public function getCategories() {
        $recusive = new CategoryRecusive();
        $html = $recusive->renderCategory();
        return $html;
    }

    public function getAllProduct() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $productAll = Product::paginate(20);
        return view('home.products', compact('menus', 'listCategory', 'productAll'));
    }

    public function getAbout() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        return view('home.about-us', compact('menus', 'listCategory'));
    }

    public function getContact() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        return view('home.contact-us', compact('menus', 'listCategory'));
    }

    public function addContact(ContactRequest $request) {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content
        ]);
        
        Session::flash('success', 'Cám ơn bạn đã liên hệ, chúng tôi sẽ phản hồi sớm nhất có thể');

        return redirect()->route('page-contact');
    }

    public function getNews() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        return view('home.news', compact('menus', 'listCategory'));
    }

    public function search(Request $request){
        $keySearch = $request->keySearch;
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $categories = Category::limit(6)->get();
        $newProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $favouriteProducts = Product::orderByDesc('views')->limit(12)->get();
        $productSearch = Product::where('name', 'like', '%'. $keySearch .'%')->orderByDesc('created_at')->get();
        return view('home.search', compact('categories', 'menus', 'listCategory', 'productSearch', 'newProducts', 'favouriteProducts'));
    }

    public function productListAjax(Request $request) {
        $data = [];
        $products = Product::select('name')->get();
        foreach($products as $product) {
            $data [] = $product['name'];
        }

        return $data;
    }

    public function getProductOrderby($name) {
        if($name == 'asc' || $name == 'desc') {
            $menus = $this->getMenus();
            $listCategory = $this->getCategories();
            $productAll = Product::orderBy('name', $name)->paginate(20);
            return view('home.products', compact('menus', 'listCategory', 'productAll'));
        }   
        abort(404); 
    }
}
