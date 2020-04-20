<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>報名表</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php if (isset($_POST["chname"])) {  ?>
        
        <h1>報名資料</h1>
        <p>我們收到以下的報名資料：</p>
        <p>姓名:<?php echo $_POST["chname"]; ?></p>
        <p>性別:<?php echo $_POST["gender"]; ?></p>
        <p>喜歡車款:<?php echo $_POST["cartype"]; ?></p>
        <p>電話:<?php echo $_POST["phone"]; ?></p>
        <p>購買日期:<?php echo $_POST["buydate"]; ?></p>
        <p>購買數量:<?php echo $_POST["qty"]; ?></p>
        <p>喜歡顏色:<?php echo $_POST["color"]; ?></p>
        <p>喜歡車款:<?php echo $_POST["cars"]; ?></p>
        <p>您的意見:<?php echo $_POST["message"]; ?></p>
        <p>訂購頻道:<?php echo implode(",", $_POST["channel"]); ?></p>
        <?php 
            if ($_FILES["mydata"]["error"]>0) { 
                echo "檔案上傳錯誤, 錯誤代碼:".$_FILES["mydata"]["error"] ;
            } else {
                $dest = "./upload/". $_FILES["mydata"]["name"];
                move_uploaded_file($_FILES["mydata"]["tmp_name"], $dest);
            }
        ?>
        
        <p>檔案名稱:<?php echo $_FILES["mydata"]["name"]; ?></p>
        <p>檔案類型:<?php echo $_FILES["mydata"]["type"]; ?></p>
        <p>檔案大小:<?php echo $_FILES["mydata"]["size"]; ?></p>
        
        <p>下載位置: <a href="upload/<?php echo $_FILES["mydata"]["name"]; ?>">
                <?php echo $_FILES["mydata"]["name"]; ?></a> </p>


        <?php } else { ?>
        <div class="container">

        <h1>報名表</h1>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="chname">中文姓名</label>
                <input type="text" name="chname" class="form-control">
                <small class="form-text">請輸入真實姓名</small>
            </div>

            <div class="form-group">
            <label>性別</label>
            <div class="form-check form-check-inline">
                <label class="radio-inline"><input type="radio" name="gender" value="M">男生</label>
                <label class="radio-inline"><input type="radio" name="gender" value="F">女生</label>
            </div>
            </div>

            <div class="form-group">
            <label>喜歡車款</label>
            <div class="form-check form-check-inline">
                <label class="radio-inline"><input type="radio" name="cartype" value="1">家用四門</label>
                <label class="radio-inline"><input type="radio" name="cartype" value="2">休旅車</label>
                <label class="radio-inline"><input type="radio" name="cartype" value="3">跑車</label>
            </div>
            </div>

            <div class="form-group">
            <label>訂購頻道</label>
            <div class="form-check form-check-inline">
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="精選">精選</label>
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="生活">生活</label>
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="娛樂">娛樂</label>
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="時事">時事</label>
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="運動">運動</label>
                <label class="checkbox-inline"><input type="checkbox" name="channel[]" value="科技">科技</label>
            </div>
            </div>

            <div class="form-group">
                <label for="phone">連絡電話</label>
                <input type="number" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <lable for="buydate">購買日期</lable>
                <input type="date" name="buydate" class="form-control">
            </div>

            <div class="form-group">
                <lable for="qty">購買數量</lable>
                <input type="range" name="qty" class="form-control" min="1" max="10">
            </div>

            <div class="form-group">
                <lable for="color">喜歡色彩</lable>
                <input type="color" name="color" class="form-control">
            </div>

            <div class="form-group">
                <label for="cars">喜歡的廠牌</label>
                <select id="cars" name="cars" class="form-control">
                    <option value="0">Please Select...</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">留下您的意見</label>
                <textarea name="message" rows="10" class="form-control"></textarea>
                <script> CKEDITOR.replace( 'message' ); </script>
            </div>

            <div class="form-group">
                <lable for="color">上傳報名表</lable>
                <input type="file" name="mydata" class="form-control" accept=".pdf">
            </div>

            <p> <input type="submit" value="送出報名表">  </p>
        </form>
        </div>

        <?php } ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>