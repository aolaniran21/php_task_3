<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover {
            color: #97310e;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
            min-height: 96px;
        }

        p {
            margin: 0 0 10px;
            padding: 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>

<body>

    <div id="container">



        <div id="body">
            <div class="row mt-2 mb-2">
                <div class="col-3">
                    <div class="card" id="weath">
                        <img id="weather" class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                            <!-- <img id="weather" src="" alt="" srcset="" height="200" width="200"> -->
                            <h5 id="temp" class="card-title"></h5>
                            <h6 id="temp" class="card-subtitle mb-2 text-muted"></h6>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card" id="ldn_time">
                        <div class="card-body">
                            <h3 id="ldn"></h3>

                        </div>
                    </div>

                </div>
                <div class="col-2">
                    <div class="card" id="est_time">
                        <div class="card-body">
                            <h3 id="est"></h3>


                        </div>
                    </div>

                </div>
                <div class="col-2">
                    <div class="card" id="nig_time">
                        <div class="card-body">
                            <h3 id="nig"></h3>


                        </div>
                    </div>

                </div>
                <div class="col-2">
                    <div class="card" id="pak_time">
                        <div class="card-body">
                            <h3 id="pak"></h3>

                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                    <img id="weather" src="" alt="" srcset="" height="200" width="200">
                    <p id="temp"></p>
                </div>

                <div class="col">
                    <p id="ldn"></p>
                </div>
                <div class="col">
                    <p id="est"></p>
                </div>
                <div class="col">
                    <p id="nig"></p>
                </div>
                <div class="col">
                    <p id="pak"></p>
                </div>

            </div> -->
            <div class="row">
                <div class="col-4">
                    <div class="card" id="reddit">
                        <div class="card-body">
                            <?php
                            $this->table->set_caption('Reddit');
                            $table_property = array('table_open' => '<table border="3" cellpadding="2" cellspacing="1" class="table_show">');
                            $this->table->set_template($table_property);

                            $this->table->set_heading();

                            foreach ($reddit as $val) {

                                $this->table->add_row($val['data']['title']);
                            }
                            echo $table = $this->table->generate();
                            ?>

                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="card">

                        <input type="text" name="" id="count">
                        <input type="button" value="count" id="bill">


                        <div class="card-body" id="show">


                        </div>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <div class="card">

                        <div class="card-body" id="show">
                            <input type="file" name="" id="img">
                            <input type="button" value="upload" id="upload">

                        </div>
                    </div>

                </div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script>
            $('.input-group-append').on('click', function(e) {
                e.preventDefault();
                $('#reset')[0].click();
            })
            $("#search-box").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "v1/api/autocomplete",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data) {
                        $("#suggesstion-box").show();
                        data = JSON.parse(data);
                        $("#suggesstion-box").html(data.html);
                        $("#search-box").css("background", "#FFF");
                    }
                });
            });
        </script>
        <script src="../../assets/js/script.js"></script>
</body>

</html>