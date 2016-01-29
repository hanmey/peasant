<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2><a href="">起始页</a></h2>
    <ul>
        <?php
        foreach ($this->config->item('admin_menu') as $key => $value):
            ?>
            <li>
                <dl>
                    <?php if (!empty($value['children'])):?>
                    <dt><?php echo $value['title'] ?></dt>
                        <?php foreach ($value['children'] as $item): ?>
                            <dd><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></dd>
                        <?php endforeach; ?>


                    <?php else: ?><dt><a href="<?php echo empty($value['url'])?'#':$value['url'] ;?>"><?php echo $value['title'];?></a></dt> <?php endif; ?>
                </dl>
            </li>
        <?php endforeach; ?>

        <li>
            <p class="btm_infor">© 望唐集团 版权所有</p>
        </li>
    </ul>
</aside>