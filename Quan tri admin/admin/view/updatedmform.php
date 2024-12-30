<section>
    <h2>Cập nhật danh mục</h2>
    <?php
    //echo var_dump($kqone);
    ?>
    <form action="index.php?act=updatedmform" method="post">
        <input type="text" name="tendm" value="<?=$kqone[0]['Tendm']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['ID']?>">
        <input type="submit" name="them" value="Thêm">
    </form>
    <br>
    <div class="tbl">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th>Tên danh mục</th>
            <th>Chỉnh sửa</th>
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