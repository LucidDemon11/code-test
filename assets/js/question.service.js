let Service = {
    // Used to adding new questions to the db
    post: function(data, callback) {
        // Set the Api url
        let url = 'index.php/QuestionsApi/post';
        // Execute the ajax call
        $.ajax(url, {
            success: function(data) {
                console.log('Ajax Post Question success.');
            },
            error: function() {
                console.log('Ajax Post Question failed.');
            }, 
            type: 'post',
            dataType: 'json', 
            contentType: 'application/x-www-form-urlencoded',
            data: data
        });
    },
    // Used for getting all the questions from the db
    get: function(callback) {
        // Set the Api url
        let url = 'index.php/QuestionsApi/get';
        // Execute the ajax call
        $.ajax(url, {
            success: function(data) {
                console.log('Ajax Get Questions success.');
                callback(data);
            },
            error: function() {
                console.log('Ajax Get Questions failed.');
            },
            type: 'get',
            dataType: 'json', 
            contentType: 'application/x-www-form-urlencoded'
        });
    }, 
    // Used to delete a specific row by the provided id
    delete: function(id, callback) {
        // Set the Api url
        let url = 'index.php/QuestionsApi/delete';
        // Execute the ajax call
        $.ajax(url, {
            success: function(data) {
                console.log('Ajax Delete Question success.')
            },
            error: function() {
                console.log('Ajax Delete Question failed.')
            },
            data: id,
            type: 'post',
            dataType: 'json', 
            contentType: 'application/x-www-form-urlencoded'
        });
    }
};
