<section>
    <h2>Sản phẩm</h2>
    <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn sản phẩm</option>
            <?php
            if(isset($dsdm)){
                foreach ($dsdm as $dm) {
                    echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
                }
            }
            ?>
        </select>
        <input type="text" name="tensp" style="width:100px;">
        <input type="file" name="hinh">
        Giá: <input type="text" name="gia" style="width:100px;">
        Số lượng:<input type="text" name="soluong" style="width:100px;">
        Mô tả:<input type="text" name="mota" style="width:100px;">
        <input type="submit" name="themmoi" value="Thêm mới">
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
                    <td> <a href="index.php?act=updatespform&id='.$item['ID'].'">Sửa</a>  <a href="index.php?act=delsp&id='.$item['ID'].'">Xóa</a> </td>
                </tr>
                </tbody>';
                $i++;
            }
        }
        ?>
    </table>
    </div>
</section>