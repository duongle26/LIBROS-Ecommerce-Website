<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-8 ml-auto" style="margin-right: 90px">
            <hr>
        </div>
    </div>
</div>

<?php
$tongsach = Count_sachTL($IDTL);
$row_tongsach = mysqli_fetch_array($tongsach);
?>

<br>
<div class="container-fluid">
    <div class="row" style="margin-left: 20px;margin-right: 20px">
        <div class="col-12 col-sm-3">
            <div style="margin-left:10px">
                <h3> DANH MỤC</h3>
                <br>
                <p>
                    <?php echo $row_tongsach['Theloai']; ?>
                    (<?php echo $row_tongsach['COUNT(Tensach)']; ?>)
                </p>
            </div>
        </div>

        <div class="col-12 col-sm-9">
            <div class="row">
                <?php
                $numperpage = 12;
                $from = ($page - 1) * $numperpage;
                $phantrang = DanhMucSach($IDTL, $from, $numperpage);

                while ($row_phantrang = mysqli_fetch_array($phantrang)) {
                    ?>
                <div class="col-4 col-xl-3 text-center" style="margin-top:30px">
                    <a href="index.php?p=product&ID_Sach=<?php echo $row_phantrang['ID_Sach'] ?>">
                        <img src="upload/images/<?php if ($row_phantrang['Hinhanh'] == null) {
                                                    echo "book_preview.png";
                                                } else {
                                                    echo $row_phantrang['Hinhanh'];
                                                } ?>" alt="book_preview" width="70" height="auto">
                        <h6 style="margin-top:10px"><?php echo $row_phantrang['Tensach'] ?></h6>
                    </a>
                    <b><?php echo number_format($row_phantrang['Giasach']) ?> đ</b>
                </div>
                <?php

            }
            ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-8 ml-auto" style="margin-right: 90px">
            <hr>
        </div>
    </div>
</div>
<br>

<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        $tongpage = ceil($row_tongsach['COUNT(Tensach)'] / $numperpage);
        if ($page > 1 && $page <= $tongpage) { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $IDTL ?>&page=<?php echo $i = $page - 1 ?>">Previous</a>
        </li>
        <?php 
    } else { ?>
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a>
        </li>
        <?php 
    }
    for ($i = 1; $i <= $tongpage; $i++) {
        if ($i == $page) { ?>
        <li class="page-item active"><a class="page-link" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $IDTL ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
        </li>

        <?php 
    } else { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $IDTL ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
        </li>
        <?php 
    }
}

if ($page >= 1 && $page < $tongpage) { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $IDTL ?>&page=<?php echo $i = $page + 1 ?>">Next</a>
        </li>
        <?php 
    } else { ?>
        <li class="page-item disabled"><a class="page-link" href="#">Next</a>
        </li>
        <?php 
    } ?>
    </ul>
</nav>
<br> 