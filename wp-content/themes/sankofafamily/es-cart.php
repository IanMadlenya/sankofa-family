<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function(){
        $('#carttable').dataTable({
            "paging": false,
            "info": false,
            "columnDefs": [ {
                "targets": 4,
                "orderable": false
            },
            {
                "targets": 2,
                "searchable": false
            }]
        });
        $('#carttable_filter').remove();
    });
    
    function searchtable() {
        $('#carttable').dataTable().fnFilter($('#searchfilter').val());
    }
</script>
</head>
<body>
<div class="w3-center">
<p><input class="w3-input estore-input-login w3-opacity" type="text" name="searchfilter" id="searchfilter" onkeyup="searchtable()" placeholder="search"></p>
<table id="carttable">
<thead>
<tr>
<th>商品信息</th>
<th>单价</th>
<th>数量</th>
<th>金额</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<tr>
<td>商品1</td>
<td>5000</td>
<td><select>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select></td>
<td>5000</td>
<td>操作</td>
</tr>
<tr>
<td>商品2</td>
<td>5000</td>
<td><select>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select></td>
<td>5000</td>
<td>操作</td>
</tr>
<tr>
<td>商品3</td>
<td>5000</td>
<td><select>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select></td>
<td>5000</td>
<td>操作</td>
</tr>
</tbody>
<tfoot>
<tr>
<td>Total</td>
<td></td>
<td></td>
<td>5000</td>
<td></td>
</tr>
</tfoot>
</table>
</div>
</body>
</html>