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
        $('#verfiy').click(function() {
            $.ajax({
                method: "post",
                url: '{{ route('post-search-blog') }}',
                data: {"query": $('#blogname').val()},
                dataType: "json",
                success: function(data) {
                    
                }
            });
        });
    </script>
</body>
</html>