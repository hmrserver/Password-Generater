<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Password Generator</title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="js/tether.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script>
      function generate() {
        $("#status").html('<img src="img/load.gif" />');
        l = $("#l").is(':checked');
        u = $("#u").is(':checked');
        d = $("#d").is(':checked');
        s = $("#s").is(':checked');
        a = $("#a").is(':checked');
        dashes = $("#dashes").is(':checked');
        length = $("#length").val();
        $.ajax({
            url: 'generate.php',
            type: 'POST',
            data: {
                l: l,
                u: u,
                d: d,
                s: s,
                a: a,
                dashes: dashes,
                length: length
            },
            success: function(data) {
                $("#status").html('');
                $("#status").html(data);
            },
            error: function() {
                $("#status").html('');
                $("#status").html('<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Change a few things up and try submitting again.</div>');
            }
        });
    };
    </script>
</head>

<body>	

    <div class="container" style="margin-top: 35px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Strong Password Generator</div>
                    <div class="card-block">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="length" required="required" placeholder="Enter Password Length" />
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="l" checked="checked" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Lower cases</span>
                                </label><span class="badge badge-success" style="margin-top: 4px;position: absolute;">Recommended</span>
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="u" checked="checked" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Upper cases</span>
                                </label><span class="badge badge-success" style="margin-top: 4px;position: absolute;">Recommended</span>
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="d" checked="checked" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Digits</span>
                                </label><span class="badge badge-success" style="margin-top: 4px;position: absolute;">Recommended</span>
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="s" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Symbols</span>
                                </label>
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="a" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Identical strings(iloILO10)</span>
                                </label>
                                <br>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="dashes" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Include Dashes</span>
                                </label>
                                <br>

                            </div>

                            <button type="button" onclick="generate()" class="btn btn-danger  btn-lg btn-block">Generate Password</button>

                        </form>
                    </div>
                </div>

                <br>
                <center>
                    <div id="status" style="overflow-wrap: break-word;"></div>
                </center>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div style="float: right;padding: 20px;color: #bfbfbf;">Created By <a href="http://github.com/hmrserver/">HMR</a> © 2016 -
        <?php echo date( 'Y');?>
    </div>
</body>
</html>