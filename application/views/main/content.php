<!-- Top bar area -->
<div id="topNavBar" class="well" >
    <div class="pull-left navbarText">Welcome to the Code-Test!</div>
    <div class="pull-right navbarText">Thanks for your time!</div>
</div>

<!-- Main Welcome Landing area -->
<div id="mainContentArea" class="col-lg-6 col-md-9 col-sm-12 center-block">
    <div class="panel panel-primary">
        <div class="panel-heading"><b><?php echo $title ?></b></div>
        <div class="panel-body">
            <p>
                Hello, my name is Dalton Haddock, and welcome to my first ever PHP Web Application!
            </p>
            <p>
                Please select one of the following buttons below. Each button has it's own unique 
                functionality. 
            </p>
            <p>
                The <b class="blue-text">Add Question</b> button will bring up a modal
                window for you, the user, to input a question and answer to be shown on the quiz. 
            </p>
            <p>
                When you are ready, the <b class="green-text">Start Quiz</b> button will bring up a different modal and allow you
                to take the quiz. 
            </p>
            <p>
                Accidentally submit a question that you didn't mean to add? The <b class="red-text">Delete Question</b> button will
                open a modal with all the questions and answers for you to delete any question.
            </p>
            <p>
                Thank you, have fun, and good luck!
            </p>
        </div>
        <div class="panel-footer">
            <div class="pager">
                <button id="btnOpenAddModal" type="button" class="btn btn-primary" onclick="showAddModal();"><i class="glyphicon glyphicon-floppy-disk"></i> Add Question</button>
                <button id="btnTakeQuiz" type="button" class="btn btn-success" onclick="showQuizModal();"><i class="glyphicon glyphicon-pencil"></i> Start Quiz</button>
                <button id="btnDeleteQuestion" type="button" class="btn btn-danger" onclick="showDeleteModal();"><i class="glyphicon glyphicon-fire"></i> Delete Question</button>
            </div>
        </div>
    </div>
</div>

<!-- Add question modal window area -->
<div id="addModal" class="modal">
    <div class="modal-content panel panel-primary">
        <div class="panel-heading">
            <span><b>Add Question Modal</b></span>
            <a id="addModalClose" onclick="closeAddModal();" class="pull-right close">&times;</a>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="txtNewQuestion" class="control-label">Question</label>
                <textarea id="txtNewQuestion" type="text" class="form-control" maxlength="250" 
                    onkeyup="checkIfValid();" placeholder="Put the question here..."></textarea>
            </div>
            <div class="form-group">
                <label for="txtNewAnswer" class="control-label">Answer</label>
                <textarea id="txtNewAnswer" type="text" class="form-control" maxlength="250" 
                    onkeyup="checkIfValid();" placeholder="And put the answer here..."></textarea>
            </div>
        </div>
        <div class="panel-footer">
            <div class="pager">
                <button id="btnAddQuestion" type="button" onclick="submitQuestion();" class="btn btn-success" disabled><i class="glyphicon glyphicon-floppy-save"></i> Save Question</button>
                <button id="btnCancelAdd" type="button" onclick="closeAddModal();" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Quiz modal window area -->
<div id="startQuizModal" class="modal">
    <div class="modal-content panel panel-primary">
        <div class="panel-heading">
            <span><b>Quiz Modal</b></span>
            <a id="startQuizClose" onclick="closeQuizModal();" class="pull-right close">&times;</a>
        </div>
        <div class="panel-body">
            <div id="questionHolder">
                <!-- Template is used here to dynamically build the quiz based on the get results -->
                <div class="quiztemplate" hidden>
                    <div class="form-group">
                        <h2 class="control-label labelQuestion"></h2>
                        <textarea type="text" class="form-control txtQuizAnswer" maxlength="250" placeholder="Put your answer here..."></textarea>
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary btnCheckAnswer" onclick="checkAnswer(this);"><i class="glyphicon glyphicon-ok"></i> Check Answer</button>
                        </div>
                        <div class="pull-right">
                            <div class="teacher-labels">
                                <label class="green-text correct-label" hidden>Correct!</label>
                                <label class="red-text incorrect-label" hidden>Incorrect, please try again.</label>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="panel-footer">
            <div class="pager">
                <button id="btnCloseQuiz" type="button" onclick="closeQuizModal();" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Close Quiz</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete modal window area -->
<div id="deleteModal" class="modal">
    <div class="modal-content panel panel-primary">
        <div class="panel-heading">
            <span><b>Delete Question Modal</b></span>
            <a id="deleteModal" onclick="closeDeleteModal();" class="pull-right close">&times;</a>
        </div>
        <div class="panel-body">
            <div id="dQuestionHolder">
                <!-- Template is used here to dynamically build the quiz based on the get results -->
                <div class="deletetemplate" hidden>
                    <div class="form-group">
                        <h2 class="control-label dLabelQuestion"></h2>
                        <label class="dLabelQuizAnswer"></label>
                        <div class="pull-right">
                            <button type="button" class="btn btn-danger dBtnDeleteQuestion" onclick="deleteQuestion(this);"><i class="glyphicon glyphicon-trash"></i> Delete This Question</button>
                        </div>
                    </div>
                    <hr>
                </div>  
            </div>
        </div>
        <div class="panel-footer">
            <div class="pager">
                <button id="btnCloseDelete" type="button" onclick="closeDeleteModal();" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>