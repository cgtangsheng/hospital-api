
<div style="width: 50%; display: inline-block;">
    <img src=<?php echo "$url"?> width="100%">
</div>
<div style="width: 50%; display: inline-block; margin-left: 0; float: right">
    <table style="margin-left: 50px;" width="90%"  border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th class="th-data" bgcolor="green" style="color: white">指标</th>
            <th class="th-data" bgcolor="green" style="color: white">检测值</th>
        </tr>
        <?php foreach($ret as $key=>$value):?>
            <tr>
                <td><?php echo $key;?></td>
                <td><?php echo $value;?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>