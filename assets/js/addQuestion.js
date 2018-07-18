let newQuestionVal = '';
let newAnswerVal = '';


window.onclick = function(event) {
    // Check if the click happened outside of the modal
    if (event.target ==  document.getElementById("addModal")) {
        // Close the modal
        closeAddModal();
    }
}

// Shows the modal
function showAddModal() {
    $("#addModal").show();
}

// Clears and closes the modal
function closeAddModal() {
    // Clear the form data
    $("#txtNewQuestion").val('');
    $("#txtNewAnswer").val('');

    // Hide the modal
    $("#addModal").hide();
}

// Checks if the Add Question button should be enabled
function checkIfValid() {
    // Get the latest values
    getAddValues();
    // Check to make sure the fields are populated
    if (newQuestionVal != null && newQuestionVal != '' && newAnswerVal != null && newAnswerVal != '') {
        // Enable the button
        $("#btnAddQuestion").removeAttr("disabled");
    } else {
        // Disable the button
        $("#btnAddQuestion").attr("disabled", true);
    }
}

// Adds the question and answer to the db
function submitQuestion() {
    // Get the latest values
    getAddValues();
    
    // Create data object
    let data = {
        'question' : newQuestionVal,
        'answer' : newAnswerVal
    };

    // Call the service to post
    Service.post(data);

    // Close the modal after posting to the db
    closeAddModal();
}

// Updates local values for check and submitting
function getAddValues() {
    newQuestionVal = $("#txtNewQuestion").val();
    newAnswerVal = $("#txtNewAnswer").val();
}