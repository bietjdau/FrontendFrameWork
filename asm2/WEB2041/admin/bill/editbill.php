<div class="row">
            <div class="row formtitle">
                <h1> CẬP NHẬT ĐƠN HÀNG</h1>
            </div>  
            <div class="row formcontent">
            <?php 
                extract($bill);
                echo '
                <form action="index.php?act=updatebill" method="post">
                <h2>Sửa danh mục</h2>
                    <div>
                    <label for="">Mã đơn hàng</label>
                    <input type="text" name="id" id="" value="'.$bill['id'].'"  readonly>
                    </div>
                    <div class="row">
                    <label for="">Tình trạng đơn hàng</label>
                    <input type="text" name="ttdh" id="" value="'.$bill['bill_status'].'">
                    </div>';
                    
                    echo'
                    <div class="row">
                    <input type="submit" name="update" value="Lưu lại">
                    <a href="index.php?act=listbill"><input type="button" value="Danh sách"></a>
                    </div>
                 </form>
                ';
            ?>
            </div>
        </div>