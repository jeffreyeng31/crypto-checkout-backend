<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhook extends CI_Controller {

    public function index() {
        $request = json_decode(file_get_contents("php://input"), true);

        if (!isset($request['id']) || !isset($request['status']) || !isset($request['email'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid payload']);
            return;
        }

        // Enqueue the job with UUID
        $jobData = json_encode($request);
        $this->Job_model->enqueueJob($jobData);

        echo json_encode(['message' => 'Job queued for processing.']);
    }
}