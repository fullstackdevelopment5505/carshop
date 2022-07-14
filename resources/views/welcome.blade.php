<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarShop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5">
        <h1>CarShop</h1>
        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Sort By</label>
            <div class="col-md-10">                        
                <select id="sort" name="column" class="form-control" >
                    <option  value=""> No Selected </option>
                    <option  value="make">Make </option>
                    <option  value="model">Model </option>
                    <option  value="year">Year </option>
                    <option  value="condition">Condition </option>
                    <option  value="price">Price</option>
                    <option  value="status">Status</option>
                    <option  value="seller">Seller</option>
                </select>                        
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-md-2 col-form-label">Filter By Car Type</label>
            <div class="col-md-10">                        
                <select id="filter" name="column" class="form-control" >
                    <option  value="">All </option>
                    <option  value="Car Dealership">Car Dealership </option>
                    <option  value="Owner">Owner </option>
                </select>                        
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Seller</th>
                </tr>
            </thead>
            <tbody>
                @include('welcome_pagination')
            </tbody>
        </table>
        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
   </div>
  </body>
</html>

<script>
$(document).ready(function(){
    function fetch_data(page, sort_by, filter_by) {
        $.ajax({
            url:"/pagination/fetch_data?page="+page+"&sortby="+sort_by+"&filterby="+filter_by,
            success:function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    $('select').on('change', function() {
        var sort = $("#sort").val();
        var filter = $("#filter").val();
        var page = $('#hidden_page').val();
        fetch_data(page, sort, filter);
    });
    
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var sort = $("#sort").val();
        var filter = $("#filter").val();
        fetch_data(page, sort, filter);
    });
});
</script>