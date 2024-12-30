<section>
    <h2>Update sản phẩm</h2>
    <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn sản phẩm</option>
            <?php
            $iddmcur = $spct[0]['ID_dm'];
            if(isset($dsdm)){
                foreach ($dsdm as $dm) {
                    if($dm['id']==$iddmcur)
                        echo '<option value="'.$dm['ID'].'" selected>'.$dm['Tendm'].'</option>';
                    else
                        echo '<option value="'.$dm['ID'].'">'.$dm['Tendm'].'</option>';
                }
            }
            ?>
        </select>
        <input type="text" name="tensp" value="<?=$spct[0]['Tensp']?>">
        <input type="file" name="hinh">
        <img src="<?=$spct[0]['img']?>" width="100px" alt="">
        Giá: <input type="text" name="gia" value="<?=$spct[0]['Gia']?>" style="width:100px;">
        Số lượng: <input type="text" name="soluong" value="<?=$spct[0]['Soluong']?>" style="width:100px;">
        Mô tả: <input type="text" name="mota" value="<?=$spct[0]['Mota']?>" style="width:100px;">
        <input type="hidden" name="id" value="<?=$spct[0]['ID']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    <br>
    <div class="tbl">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Chỉnh sửa</th>
        </tr>
        </thead>
        <?php
        //var_dump($kq);
        ?>
        <?php
        if(isset($kq)&&(count($kq)>0)){
            $i=1;
            foreach ($kq as $item) {
                echo '<tbody>
                <tr>
                    <td style="text-align: center">'.$i.'</td>
                    <td>'.$item['Tensp'].'</td>
                    <td><img src="'.$item['Hinhanh'].'" width="100px"></td>
                    <td>'.$item['Gia'].'</td>
                    <td>'.$item['Soluong'].'</td>
                    <td>'.$item['Mota'].'</td>
                    <td> <a href="index.php?act=updatespform&id='.$dm['ID'].'">Sửa</a>  <a href="index.php?act=delsp&id='.$dm['ID'].'">Xóa</a> </td>
                </tr>
                </tbody>';
                $i++;
            }
        }
        ?>
    </table>
    </div>
</section>