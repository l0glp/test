<?php namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Models\Front\ApplicationModel;

class ApplicationController extends Controller
{
    /**
     * Index for the app, show the menu with the options
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        return view('index');
    }

    /**
     * List the table with the product data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productsIndex () {

        return view('products.index', [
            'section' => 'list',
        ]);
    }

    /**
     * Update product table
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateTableProd() {
        $products = (new ApplicationModel())->getProducts();
        if (!empty($products)) {
            return response(json_encode(['data' => $products]), 200);
        }
        return response(json_encode(['data' => []]), 200);
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loadProducts () {
        return view('products.index', [
            'section' => 'load'
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loadProductsPost (Request $request) {
        if ($request->input() && !empty($request->input('fileContent'))) {
            $data = json_decode($request->input('fileContent'), true);
            if (!empty($data)) {
                (new ApplicationModel())->loadProducts($data);
                return redirect(route('products.index'));
            }
        }
        return redirect()->back()->withErrors('msg', 'The file is not valid');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clientsIndex () {
        return  view('clients.index', [
            'section' => 'list'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateTableClients() {
        $clients = (new ApplicationModel())->clientsForTable();
        if (!empty($clients)) {
            return response(json_encode(['data' => $clients]), 200);
        }
        return response(json_encode(['data' => []]), 200);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clientsDelete ($id) {
        $ack = (new ApplicationModel())->deleteClient($id);
        if ($ack) {
            return redirect(route('clients.index'));
        }
        return redirect()->back()->withErrors('msg', 'Something went wrong');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clientsDetail ($id = null) {
        $appModelObj = new ApplicationModel();
        $client = null;
        if (!empty($id)) {
            $client = $appModelObj->getClient($id);
        }
        return view('clients.index', [
            'section' => 'detail',
            'products' => $appModelObj->getProductsForClient(),
            'client' => $client
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function clientsDetailPost(Request $request) {
        if ($request->input()) {
            if (!empty($request->input('id_num'))) {
                $ack = (new ApplicationModel())->saveClient($request->input());
                if ($ack) {
                    return redirect(route('clients.index'));
                }
            }
        }
        return redirect()->back()->withErrors('msg', 'Something was wrong');
    }
}