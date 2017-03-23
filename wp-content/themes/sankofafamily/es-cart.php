<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/css/carttable.css">
    <script>
        $(document).ready(function() {
            $('#carttable').dataTable({
                "paging": false,
                "info": false,
                "columnDefs": [{
                        "targets": 4,
                        "orderable": false
                    },
                    {
                        "targets": 2,
                        "searchable": false
                    }
                ]
            });
            $('#carttable_filter').remove();
        });

        function searchtable() {
            $('#carttable').dataTable().fnFilter($('#searchfilter').val());
        }
        
        function setItem3Total() {
            var item1total = 0;
            var item2total = 0;
            if($('#item1total').length) {
                item1total = parseInt($('#item1total').html());
            }
            if($('#item2total').length) {
                item1total = parseInt($('#item2total').html());
            }
            if($('#item3price').val() != "") {
                $('#item3total').html($('#item3price').val());
                $('#totalprice').html(item1total + item2total + parseInt($('#item3total').html()));
            } else {
                $('#item3total').html(0);
                $('#totalprice').html(item1total + item2total);
            }
        }
        
        function deleteItem(itemId) {
            var delPrompt = confirm("确认删除此项？");
            if (delPrompt == true) {
                parent.document.location = "/wp-content/themes/sankofafamily/es-trash.php?itemid=" + itemId;
            }
        }
        
        function changeQuantity1(itemId) {
            var changeLocation = "/wp-content/themes/sankofafamily/es-qchange.php?itemid=" + itemId + "&quantity=" + $('#quantitySel1').val();
            if(($('#item3price').val() != null) && ($('#item3price').val() != "")) {
                changeLocation = changeLocation + "&price=" + $('#item3price').val();
            }
            parent.document.location = changeLocation;
        }
        
        function changeQuantity2(itemId) {
            var changeLocation = "/wp-content/themes/sankofafamily/es-qchange.php?itemid=" + itemId + "&quantity=" + $('#quantitySel2').val();
            if(($('#item3price').val() != null) && ($('#item3price').val() != "")) {
                changeLocation = changeLocation + "&price=" + $('#item3price').val();
            }
            parent.document.location = changeLocation;
        }
    </script>
</head>

<body>
    <div class="w3-center">
        <?php
        session_start();
        require_once('DBConnect.php');
        
        if(isset($_SESSION['esuserid'])) {
            $query = "select * from cs_cart where CustomerId=" . $_SESSION['esuserid'] . " and Sold=0 and Trash=0";
            $result = $mysqli->query($query);
            $CartItemName = "";
            $CartItemTotal = 0;
            $CartQuantity = "";
            $CartPrice = "";
            $CartQuantityAdd = "";

            if(($result) && ($result->num_rows !== 0)){ 
                echo "<p><input class='w3-input estore-input-login estore-input-cart w3-opacity' type='text' name='searchfilter' id='searchfilter' onkeyup='searchtable()' placeholder='search'></p><table id='carttable'><thead><tr><th>商品信息</th><th>单价</th><th>数量</th><th>金额</th><th>操作</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                    if($row['CartItemId'] == 1) {
                        $CartItemName = "Trust Setup Service";
                        $CartItemTotal = "<td id='item1total'>" . ($row['Price'] * $row['CartQuantity']) . "</td>";
                        $CartPrice = $row['Price'];
                        if($row['CartQuantity'] == 2) {
                            $CartQuantityAdd = "<option value='1'>1</option>";
                        } elseif($row['CartQuantity'] > 2) {
                            $CartQuantityAdd = "<option value='" . ($row['CartQuantity']-2) . "'>" . ($row['CartQuantity']-2) . "</option><option value='" . ($row['CartQuantity']-1) . "'>" . ($row['CartQuantity']-1) . "</option>";
                        }
                        $CartQuantity = "<select id='quantitySel1' onchange='changeQuantity1(" . $row['Id'] . ")'>" . $CartQuantityAdd . "<option value='" . $row['CartQuantity'] . "' selected>" . $row['CartQuantity'] . "</option><option value='" . ($row['CartQuantity']+1) . "'>" . ($row['CartQuantity']+1) . "</option><option value='" . ($row['CartQuantity']+2) . "'>" . ($row['CartQuantity']+2) . "</option></select>";
                    } elseif($row['CartItemId'] == 2) {
                        $CartItemName = "Business Study Service";
                        $CartItemTotal = "<td id='item2total'>" . ($row['Price'] * $row['CartQuantity']) . "</td>";
                        $CartPrice = $row['Price'];
                        if($row['CartQuantity'] == 2) {
                            $CartQuantityAdd = "<option value='2'>2</option>";
                        } elseif($row['CartQuantity'] > 2) {
                            $CartQuantityAdd = "<option value='" . ($row['CartQuantity']-2) . "'>" . ($row['CartQuantity']-2) . "</option><option value='" . ($row['CartQuantity']-1) . "'>" . ($row['CartQuantity']-1) . "</option>";
                        }
                        $CartQuantity = "<select id='quantitySel2' onchange='changeQuantity2(" . $row['Id'] . ")'>" . $CartQuantityAdd . "<option value='" . $row['CartQuantity'] . "' selected>" . $row['CartQuantity'] . "</option><option value='" . ($row['CartQuantity']+1) . "'>" . ($row['CartQuantity']+1) . "</option><option value='" . ($row['CartQuantity']+2) . "'>" . ($row['CartQuantity']+2) . "</option></select>";
                    } else {
                        $CartItemName = "Expression of Interest";
                        $CartItemTotal = "<td id='item3total'>" . ($row['Price'] * $row['CartQuantity']) . "</td>";
                        $CartPrice = "<input type='text' name='item3price' id='item3price' value='" . $row['Price'] . "' style='width:50px' onkeyup='setItem3Total()'>";
                        $CartQuantity = "1";
                    }
                    echo "<tr><td>" . $CartItemName . "</td><td>" . $CartPrice . "</td><td>" . $CartQuantity . "</td>" . $CartItemTotal ."<td><button onclick='deleteItem(" . $row['Id'] . ")' id='deleteItemBtn'><span class='glyphicon glyphicon-remove-sign'></span></button></td></tr>";
                }
                $totalquery = "SELECT SUM(Price * CartQuantity) AS Total FROM cs_cart WHERE CustomerId=" . $_SESSION['esuserid'] . " AND Sold=0 AND Trash=0";
                $totalresult = $mysqli->query($totalquery);
                $totalrow = $totalresult->fetch_assoc();
                echo "</tbody><tfoot><tr><td><b>Total</b></td><td></td><td></td><td id='totalprice'><b>" . $totalrow['Total'] . "</b></td><td></td></tr></tfoot></table>";
            }
        } ?>
    </div>
</body>
</html>
