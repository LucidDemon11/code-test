let quizQuestions = [];
let createdHtml = [];

window.onclick = function(event) {
    // Check if the click happened outside of the modal
    if (event.target ==  document.getElementById("startQuizModal")) {
        // Close the modal
        closeQuizModal();
    }
}

// Shows and populated the quiz modal
function showQuizModal() {
    $("#startQuizModal").show();
    getQuestions(function() { populateQuestions(); });
}

// Clears and closes the modal
function closeQuizModal() {
    // Hide the modal
    $("#startQuizModal").hide();

    // Delete the cloned html to avoid duplicates when the modal is reopened
    for (let i = 0; i < createdHtml.length; i++) {
        createdHtml[i].remove();
    }
}

// Gets the questions from the javascript Service
function getQuestions(callback) {
    // Call the service
    Service.get(function(data) {
        // Set the results to the variable
        quizQuestions = data.questions;
        callback();
    });
}

function populateQuestions() {
    // Grab the template to clone
    let template = $('.quiztemplate');

    // For each quiz question
    for (let i = 0; i < quizQuestions.length; i++) {
        // Null out the clone
        clone = null;
        // Set the clone to the template
        clone = template.clone();
        // Set the question text to the clone
        clone.find('.labelQuestion').html(quizQuestions[i].questionText);
        // Add an identifiable attribute for checking the answer later
        clone.find('.txtQuizAnswer').attr('data-questionId', i);
        clone.find('.btnCheckAnswer').attr('data-questionid', i);
        clone.find('.correct-label').attr('data-questionid', i);
        clone.find('.incorrect-label').attr('data-questionid', i);

        // Add the clone to the container and display it
        clone.appendTo('#questionHolder').show();
        // Add the clone to the html array to be deleted in the event that the modal is closed
        createdHtml.push(clone);
    }
}

function checkAnswer(button) {
    let isCorrect = null;

    // Get the question id
    let id = $(button).data('questionid');
    // Grab the question by the id
    let selectedQuestion = quizQuestions[id];
    // Grab the given answer, determined by the identifiable attribute added earlier
    let givenAnswer = $(".txtQuizAnswer[data-questionid='" + id + "']").val();
    // If the answer is correct
    if (selectedQuestion.questionAnswer === givenAnswer) {
        isCorrect = true;
    } else {
        // If it is not correct
        isCorrect = false;
    }

    // If the answer was correct/incorrect, show/hide the appropriate labels
    if (isCorrect) {
        $(".correct-label[data-questionid='" + id + "']").show();
        $(".incorrect-label[data-questionid='" + id + "']").hide();
    } else {
        $(".correct-label[data-questionid='" + id + "']").hide();
        $(".incorrect-label[data-questionid='" + id + "']").show();
    }

}