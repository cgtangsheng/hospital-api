<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-13
 * Time: 下午5:02
 */
?>
<head>
    <style type="text/css">
        .lable-modal{
            font-weight: bolder;
            font-size: larger;
        }
    </style>
</head>
<div id="page-content">
				<!--Modal body-->
				<div class="modal-body">
					<ul>
                        <li>
                            <p class="lable-modal">BMI指数:<span><?php echo $data["BMI"]?></span></p>
                        </li>
                        <li>
                            <p class="lable-modal">腰臀比:<span><?php echo $data["WHR"]?></span></p>
                        </li>
                    <?php if(isset($data["is_fat"])):?>
                        <li>
                            <p class="lable-modal">潜在警告:<span style="color: red"><?php echo $data["is_fat"]?></span></p>
                        </li>
                    <?php endif;?>
                    </ul>
				</div>

				<!--Modal footer-->
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					<button class="btn btn-primary">Save changes</button>
				</div>

</div>
