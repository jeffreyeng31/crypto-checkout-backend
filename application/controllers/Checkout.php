<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function index() {
        $request = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($request['amount']) || !isset($request['email'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        // Mock Coinbase API call
        $paymentUrl = "https://fake.coinbase.com/pay/" . rand(10000, 99999);
        echo json_encode(['payment_url' => $paymentUrl]);
    }
}