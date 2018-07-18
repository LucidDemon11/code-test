<?php

class Question_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();

        // Loads the database for use later
        $this->load->database();
    }

    // Adds the question to the db
    public function createQuestion($data)
    {
        $output = null;
        try {
            // Execute the insert with the passed in data
            $query = $this->db->insert('quiz_qa', $data);

            // Check to make sure single row was put in 
            if($this->db->affected_rows() === 1) {
                // Set the id that was put in
                $output = $this->db->insert_id();
            } else {
                // Set the return to failure
                $output = false;
            }
        } catch (Exception $e) {
            error_log('error in model -> createQuestion');
            error_log($e);
        }
        return $output;
    }

    // Pulls the questions from the db
    public function getQuestions()
    {
        try {
            // Set the order for assurance
            $this->db->order_by('id ASC');

            // Execute the get
            $get = $this->db->get('quiz_qa');

            // Return the results from the query
            return $get->result();
        } catch (Exception $e) {
            error_log('error in model -> getQuestions');
            error_log($e);
        }
    }

    // Deletes a question by the supplied id
    public function deleteQuestion($result) 
    {
        $output = null;
        
        try {
            // Find the row in the db
            $this->db->where('id', $result['id']);
            // And delete the row
            $this->db->delete('quiz_qa');

            // Check that only one row was affected
            if($this->db->affected_rows() === 1) {
                // Return success
                $output = true;
            } else {
                // Return failure
                $output = false;
            }

        } catch (Exception $e) {
            error_log('error in model -> deleteQuestion - id = ' + $id);
            error_log($e);
        }

        return $output;
    }
}

?>