let deleteQuestions = [];
let createdDeleteHtml = [];

window.onclick = function(event) {
    // Check if the click happened outside of the modal
    if (event.target ==  document.getElementById("deleteModal")) {
        // Close the modal
        closeDeleteModal();
    }
}

// Shows and populated the quiz modal
function showDeleteModal() {
    $("#deleteModal").show();
    getDeleteQuestions(function() { populateDeleteQuestions(); });
}

// Clears and closes the modal
function closeDeleteModal() {
    // Hide the modal
    $("#deleteModal").hide();

    // Delete the cloned html to avoid duplicates when the modal is reopened
    for (let i = 0; i < createdDeleteHtml.length; i++) {
        createdDeleteHtml[i].remove();
    }
}

// Gets the questions from the javascript Service
function getDeleteQuestions(callback) {
    // Call the service
    Service.get(function(data) {
        // Set the results to the variable
        deleteQuestions = data.questions;
        callback();
    });
}

function populateDeleteQuestions() {
    // Grab the template to clone
    let template = $('.deletetemplate');
    
    // For each quiz question
    for (let i = 0; i < deleteQuestions.length; i++) {
        // Null out the clone
        clone = null;
        // Set the clone to the template
        clone = template.clone();
        // Set the question data to the clone
        clone.find('.dLabelQuestion').html(deleteQuestions[i].questionText);
        clone.find('.dLabelQuizAnswer').html(deleteQuestions[i].questionAnswer);
        // Add the db.id and array.id to the button for easy deleting
        clone.find('.dBtnDeleteQuestion').attr('data-questionid', deleteQuestions[i].id).attr('data-arrayid', i);
        
        // Add the clone to the container and display it
        clone.appendTo('#dQuestionHolder').show();
        // Add the clone to the html array to be deleted in the event that the modal is closed
        createdDeleteHtml.push(clone);
    }
}

function deleteQuestion(button) {
    // Grab the ids
    let questionId = $(button).data('questionid');
    let arrayId = $(button).data('arrayid');
    // Grab the text for the confirm box
    let questionText = deleteQuestions[arrayId].questionText;

    // Ask the user if they really want to delete this question
    if(confirm("Are you sure you would like to delete this question?\r\nQuestion Text: " + questionText)) {
        console.log('Delete requested for id ' + questionId);
        // Set the data
        let data = { 'id': questionId };
        // Call the service to delete
        Service.delete(data);
        // Close the modal
        closeDeleteModal();
    } else {
        // else return back to the page as if nothing happened
        return false;
    }
}
