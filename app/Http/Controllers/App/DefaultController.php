<?php

namespace App\Http\Controllers\App;

    use App\Http\Controllers\Controller;
    use App\Models\Article;
    use App\Models\Setting;
    use App\Models\ProductReviews;
    use App\Models\UserOrder;
    use Illuminate\Http\Request;
    use Mail;
    use DB;
    use App\Models\Product;

    class DefaultController extends Controller
    {
        public function __construct()
        {
//            if (Setting::get('app.access_only_for_users', false)) {
//                $this->middleware('auth');
//            }
        }

        public function showArticle($id)
        {
            $article = Article::where('id', $id)->get()->first();

            if ($article == null) {
                return redirect()->route('index');
            }

            return view('frontend.article', [
                'article' => $article,
                'metaTITLE' => $article->title,
                'metaDESC' => strip_tags(substr(strlen($article->body) ? decrypt($article->body) : '', 0, 65)),
            ]);
        }

        public function showIndex($pageNumber = 0)
        {
            $articles = Article::orderByDesc('updated_at')->paginate(10, ['*'], 'page', $pageNumber);

            if ($pageNumber > $articles->lastPage() || $pageNumber < 0) {
                return redirect()->route('index-with-pageNumber', 1);
            }

            $shopName = Setting::where([
                'key' => 'app.shop_name'
            ])->first();

            $shopLogo = Setting::where([
                'key' => 'app.shop_logo'
            ])->first();

            $shopBanner = Setting::where([
                'key' => 'app.shop_banner'
            ])->first();

            $currencyCode = \App\Models\Setting::getShopCurrency();
            $reviews = ProductReviews::select(DB::raw(" sum(negative) as negative_sum"),
                DB::raw(" sum(positive) as positive_sum"))->first();

            $salesCount = UserOrder::all()->count();

            $symbol = $currencyCode == 'EUR' ? '€' : '$';
            return view('frontend.index', [
                'articles' => $articles,
                'shopLogo' => $shopLogo,
                'shopName' => $shopName,
                'shopBanner' => $shopBanner,
                'symbol'  => $symbol,
                'reviews'  => $reviews,
                'salesCount' => $salesCount
            ]);
        }
        public function getProductsTabs($pageNumber = 0)
        {
            if($pageNumber == 0){
                $products = Product::orderBy("created_at", "desc")->get();
            } else {
                $products = Product::where('category_id',$pageNumber)->orderBy("created_at", "desc")->get();
            }
            return response()->json($products);
        }
    }
