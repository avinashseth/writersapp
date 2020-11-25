<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search For Blogs</title>
    <style>
    
        .green {
            color: green;
        }

        .red {
            color: red;
        }
    
    </style>
</head>
<body>
    
    
    <p><input type="text" name="blogname" id="blogname"/></p>
    <p id="feedback"></p>
    <p><button id="verfiy">Search Blog</button></p>






    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        var blogName = $('#blogname');
        blogName.keyup(function() {
            if(blogName.val().length > 3) {
                var resultFeedback = '<ul>';
                $.ajax({
                    method: "post",
                    url: '{{ route('post-search-blog') }}',
                    data: {"query": $('#blogname').val()},
                    dataType: "json",
                    success: function(data) {
                        if(data.length > 0) {
                            $.each(data, function( index, value ) {
                                resultFeedback += '<li><a href="' + value.link + '">' + value.title + '</a></li>';
                            });
                            resultFeedback += '</ul>';
                            $('#feedback').html(resultFeedback);
                        } else {
                            $('#feedback').html('No results found for query <strong>' + blogName.val() + '</strong>');
                        }
                    }
                });
            } else {
                $('#feedback').html('');
            }
        });
        
    </script>
</body>
</html>