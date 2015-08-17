<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    </style>
</head>

<body cz-shortcut-listen="true">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Production Report</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           {{-- {{dd($listings)}}--}}

            <table class="table table-striped">
                <tbody>
                @foreach($listings['listings'] as $listing)
                    <tr>
                        <td>{{$listing['StreetDirPrefix']}} {{$listing['StreetNumber']}} {{$listing['StreetName']}} {{$listing['StreetSuffix']}} {{$listing['StreetDirSuffix']}}</td>
                        <td>{{$listing['City']}}, IN</td>
                        <td>{{$listing['Status']}}</td>
                        <td>{{$listing['ListAgentFullName']}}</td>
                        <td>${{number_format($listing['ListPrice'])}}</td>
                        <td>{{$listing['LastChangeType']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>