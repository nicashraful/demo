<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}//End of if
$token = $_SESSION['token'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New User Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/w3-css/4.1.0/w3.min.css" integrity="sha512-Z6UIAdEZ7JNzeX5M/c5QZj+oqbldGD+E8xJEoOwAx5e0phH7kdjsWULGeK5l2UjehKtChHDaUY2rQAF/NEiI9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function() {        
                $(document).on("keyup", "#name", function() {
                    var name = $(this).val();
                    var regex = /^[a-zA-Z\s]+$/;
                    if (regex.test(name) == false) {
                        $(this).notify("Only Letters and space are allowed");
                    } else if((name.length < 3) || (name.length > 10)) {
                        $(this).notify("Lenght must be between 3 to 10");
                    } else {
                        $(this).trigger("notify-hide");
                    }//End of if else
                });
            });
        </script>
        <style type="text/css">
            font.error {
                font-weight: bold; 
                font-style: italic; 
                color:#e60707; 
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="w3-container w3-half w3-margin-top" style="width: 100%">
            <form id="frm-register" method="post" action="register.php" class="w3-container w3-card-4" enctype="multipart/form-data">
                <input type="text" name="token" value="<?php echo $token; ?>" />
                <p>
                    <label>Name (Only Letter ans space are allowed)</label>
                    <input id="name" name="name" class="w3-input" type="text" maxlength="20"  autocomplete="off" />
                    <font id="name-error" class="error"></font>
                </p>
                <p>
                    <label>Mobile</label>
                    <input id="mobile" name="mobile" class="w3-input" type="number" maxlength="10"  autocomplete="off" />
                </p>
                <p>
                    <label>Email</label>
                    <input id="email" name="email" class="w3-input" type="email" maxlength="20"  autocomplete="off" />
                </p>
                <p>
                    <label>Address</label>
                    <input id="address" name="address" class="w3-input" type="text" maxlength="30"  autocomplete="off" />
                </p>
                <p>
                    <label>File</label>
                    <input id="docfile" name="docfile" class="w3-input" type="file" accept=".png, .jpeg, .jpg, .gif, .pdf" />
                </p>
                <p style="text-align: center"> <button id="btn-submit" class="w3-button w3-section w3-teal w3-ripple" type="submit"> Submit </button></p>
            </form>
        </div>
    </body>
</html> 