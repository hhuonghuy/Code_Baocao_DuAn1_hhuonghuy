<section>
    <h2>Danh mục</h2>
    <form action="index.php?act=adddm" method="post">
        <input type="text" name="tendm">
        <input type="submit" name="themmoi" value="Thêm mới">
    </form>
    <br>
    <div class="tbl">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <?php
        //var_dump($kq);
        ?>
        <?php
        if(isset($kq)&&(count($kq)>0)){
            $i=1;
            foreach ($kq as $dm) {
                echo '<tbody>
                <tr>
                    <td style="text-align: center">'.$i.'</td>
                    <td>'.$dm['Tendm'].'</td>
                    <td> <a href="index.php?act=updatedmform&id='.$dm['ID'].'">Sửa</a>  <a href="index.php?act=deldm&id='.$dm['ID'].'">Xóa</a> </td>
                </tr>
                </tbody>';
                $i++;
            }
        }
        ?>
    </table>
    </div>
</section>