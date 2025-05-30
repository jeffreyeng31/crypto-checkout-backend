<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobProcessor extends CI_Controller {

    public function process() {
        $this->load->model('Job_model');

        // Fetch pending jobs
        $jobs = $this->Job_model->getPendingJobs();

        foreach ($jobs as $job) {
            $data = json_decode($job->payload, true);

            // Prepare transaction data
            $transaction = [
                'transaction_id' => $data['id'],
                'email' => $data['email'],
                'status' => $data['status'],
                'timestamp' => date('Y-m-d H:i:s')
            ];

            // Save the transaction using the model
            $this->Job_model->saveTransaction($transaction);

            // Mark job as processed using the model
            $this->Job_model->markJobAsProcessed($job->id);
        }
    }
}