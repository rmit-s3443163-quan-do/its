
        <h1 class="page-header">Pre-question</h1>
        <div class="table-responsiv">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Querries</th>
                    <th>Created</th>
                    <th>Last edit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>A good OO design should aim..</td>
                    <td>3</td>
                    <td>Quan Do</td>
                    <td>13:30 05/07/15</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Sequence diagrams are best..</td>
                    <td>2</td>
                    <td>Quan Do</td>
                    <td>14:10 05/07/15</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Consider the sequence diagram..</td>
                    <td>5</td>
                    <td>Quan Do</td>
                    <td>14:15 05/07/15</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Consider the communication diagram..</td>
                    <td>1</td>
                    <td>Quan Do</td>
                    <td>14:32 05/07/15</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 class="sub-header">Question Editor</h2>
        <form>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" placeholder="Question content"/>
            </div>
            <div class="form-group">
                <label for="option1">Option 1</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option1" placeholder="Option 1"/>

            </div>
            <div class="form-group">
                <label for="option2">Option 2</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option2" placeholder="Option 2"/>

            </div>
            <div class="form-group">
                <label for="option3">Option 3</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option3" placeholder="Option 3"/>

            </div>
            <div class="form-group">
                <label for="option4">Option 4</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option4" placeholder="Option 4"/>

            </div>
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

<script>
    $('.answer').click(function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });
    $('input.form-control').summernote({
        onChange: function(e) {
//            $('#preview').html($('#summernote').code());
            // do something
        },

        minHeight: 200,                 // set editor height
        focus: true,                 // set focus to editable area after initializing summernote
        toolbar: [
            //[groupname, [button list]]

            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture','link','hr']],
            ['misc',['codeview','undo','redo']]
        ]

    });

</script>
