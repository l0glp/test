<?php namespace App\Models\Front;

use App\Models\Clients;
use App\Models\Products;
use Mockery\CountValidator\Exception;

class ApplicationModel
{
    /**
     * Load products from array
     * @param array $data
     * @return bool|static
     */
    public function loadProducts(array $data)
    {
        $ack = false;
        $productObj = new Products();
        foreach($data as $d) {
            try {
                $ack = $productObj::firstOrCreate($d);
            } catch (Exception $e) {
                continue;
            }
        }
        return $ack;
    }

    /**
     * Get all product from db for the list
     * @return array
     */
    public function getProducts() {
        $out = [];
        $data = (new Products())->get();
        foreach ($data as $d) {
            $attributes = $d->getAttributes();
            unset($attributes['updated_at'], $attributes['created_at']);
            $out[] = $attributes;
        }
        return $out;
    }

    /**
     * Get products for table client in format (code => name)
     * @return array
     */
    public function getProductsForClient() {
        $out = [];
        $products = $this->getProducts();
        foreach ($products as $product) {
            $out[$product['code']] = $product['name'];
        }
        return $out;
    }

    /**
     * Get all clients from db
     * @return array
     */
    public function getClients() {
        $out = [];
        $data = (new Clients())->get();
        foreach ($data as $d) {
            $attributes = $d->getAttributes();
            unset($attributes['updated_at'], $attributes['created_at']);
            $out[] = $attributes;
        }
        return $out;
    }

    /**
     * Format clients for the table with the column actions
     * @return array
     */
    public function clientsForTable(){
        $clients = $this->getClients();
        $products = $this->getProductsForClient();
        $out = [];
        if (!empty($clients)) {
            foreach($clients as $client) {
                $client['actions'] = view('clients.actions', ['id_num' => $client['id_num']])->render();
                if (!empty($client['products'])) {
                    if (strpos($client['products'], ',')) {
                        $clientProduct = explode(',', $client['products']);
                        $client['products'] = [];
                        foreach ($clientProduct as $p) {
                            if (!empty($products[$p])) {
                                $client['products'][] = $products[$p];
                            }
                        }
                        $client['products'] = implode(',', $client['products']);
                    } else {
                        $client['products'] = $products[$client['products']];
                    }
                }
                $out[] = $client;
            }
        }
        return $out;
    }

    public function getClient($id) {
        $client = (new Clients())->find($id)->getAttributes();
        if (strpos($client['products'], ',') > -1) {
            $client['products'] = explode(',', $client['products']);
        } else {
            $client['products'] = [$client['products']];
        }

        return $client;
    }

    /**
     * Save data for the client entity
     * @param array $data
     * @return bool|int|string|static
     */
    public function saveClient(array $data) {
        $clientObj = new Clients();

        if (!empty($data['products']) && is_array($data['products'])) {
            $data['products'] = implode(',', $data['products']);
        }

        if (empty($data['products'])) {
            $data['products'] = '';
        }

        //For dni updates
        $id =  $data['id_num'];
        if (!empty($data['id_num_old']) && $data['id_num_old'] != $data['id_num']) {
            $id = $data['id_num_old'];
        }

        $clientToUpdate = $clientObj->find($id);
        if (!empty($clientToUpdate)) {
            try {
                $ack = $clientToUpdate->update($data);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            try {
                $ack = $clientObj->create($data);
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }

        return $ack;
    }

    /**
     * Delete client from database
     * @param $id
     * @return mixed
     */
    public function deleteClient($id) {
        $ack = (new Clients())->find($id)->delete();
        return $ack;
    }
}