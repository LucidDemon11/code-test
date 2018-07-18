<?php

class QuestionsApi extends CI_Controller {

    // Basic function to display that the controller is "hittable"
    public function index()
    {
        echo 'QuestionsApi';
    }

    // Adds questions to the db
    public function post()
    {
        // Pull the data that was passed in from the ajax
        $data = $this->input->post();

        // Load the model for use
        $this->load->model('Question_model');

        // Set the results object with the data 
        $result = [
            'questionText' => $data['question'],
            'questionAnswer' => $data['answer']
        ];

        // Call create in the model
        $success = $this->Question_model->createQuestion($result);

        // Check if successful and set the result
        if($success) {
            $result['result'] = 'success';
            $result['id'] = $success;
        } else {
            $result['result'] = 'failure';
            $result['error'] = 'Failed on insert';
        }
        // Pass and return the result
        $this->returnResult($result);
    }

    // Pulls the questions from the db
    public function get()
    {
        // Load the model for use
        $this->load->model('Question_model');

        // Set the results object with the questions
        $result = [
            'questions' => $this->Question_model->getQuestions(),
            'status' => 'success'    
        ];
        // Pass and return the result
        $this->returnResult($result);
    }

    // Deletes a record by the provided id
    public function delete() 
    {        
        try {
            // Pull the data that was passed in from the ajax
            $data = $this->input->post();

            // Load the model for use
            $this->load->model('Question_model');

            // Set the results object with the id
            $result = ['id' => $data['id']];

            // Pass the id to deleteQuestion in the model
            $success = $this->Question_model->deleteQuestion($result);

            // Check if successful and set the result
            if($success) {
                $result['status'] = 'success';
            } else {
                $result['status'] = 'failure';
            } 

            // Pass and return the result
            $this->returnResult($result);
        } 
        catch (Exception $e) 
        {
            error_log('failed in api delete');
            error_log($e);
        }      
    }

    // Set the result to be returned
    private function returnResult($result) 
    {
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}

?>