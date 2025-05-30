<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

    public function getPendingJobs() {
        $this->db->where('status', 'pending');
        return $this->db->get('jobs')->result();
    }

    public function enqueueJob($jobData) {
        $this->db->trans_start();
        $sql = "INSERT INTO jobs (id, payload) VALUES (UUID(), ?)";
        $this->db->query($sql, array($jobData));
        $this->db->trans_complete();
        return;
    }

    public function saveTransaction($transaction) {
        $this->db->trans_start();
        $sql = "INSERT INTO transactions (id, transaction_id, email, status, created_at) VALUES (UUID(), ?, ?, ?, ?)"
        $this->db->query($sql, array($transaction['transaction_id'],$transaction['email'],$transaction['status'],$transaction['timestamp']));
        $this->db->trans_complete();
        return;

    }

    public function markJobAsProcessed($jobId) {
        $this->db->trans_start();
        $sql = "UPDATE jobs SET status = ? WHERE id = ?";
        $this->db->query($sql, array('processed', $jobId));
        $this->db->trans_complete();
        return;
    }
}