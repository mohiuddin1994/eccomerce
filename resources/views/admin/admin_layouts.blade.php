<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        
       

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
        
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> 

        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
       
        <style>
            f_active{
                color: white;
            }
        </style>


    </head>
    <body class="sb-nav-fixed">
   


        @yield('admin_content')
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> 
        <script src="{{asset('admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('admin/assets/demo/chart-bar-demo.js')}}"></script> 
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>

           
        <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
              });
          });
    
          </script>



        
        @yield('category_index')
        @yield('category_create')
        @yield('product_create')
        @yield('attribute')
        @yield('permission')
        @yield('order_statu')


        
    </body>
</html>
		