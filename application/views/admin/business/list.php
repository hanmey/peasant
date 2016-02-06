<section>
	<h2><strong style="color:grey;"><?php echo $this->subject;?>管理</strong></h2>
	<div class="page_title">
		<form method="get" >
		<input type="text" class="textbox" placeholder="请输入公司名称"/>
		<input type="text" class="textbox" placeholder="联系电话."/>

		<input type="button" value="搜索" class="group_btn fa-search"/>
		<input type="button" value="全部显示" class="group_btn"/>
		<a class="fr top_rt_btn" href="/admin/<?php echo  $this->router->class;?>/add">添加<?php echo $this->subject;?></a>
		</form>
	</div>
	<table class="table">
		<thead>
		<th>序号</th>
		<th>公司名称</th>
		<th>联系电话</th>
		<th>所属行业</th>
		<th>注册资金</th>
		<th>操作</th>
		</thead>
		<tbody>
		<?php if (!empty($list)): ?>
			<?php foreach ($list as $key => $value): ?>

				<tr>
					<td><?php echo $key + 1 ?></td>
					<td><?php echo $value['b_name'] ?></td>
					<td><?php echo $value['b_tel'] ?></td>
					<td><?php echo $value['b_industry'] ?></td>
					<td><?php echo $value['b_registered_capital'] ?></td>

					<td><a href="/admin/<?php echo  $this->router->class;?>/edit/<?php echo $value['id']; ?>">编辑</a></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
	<aside class="paging">
		<?php if (!empty($pagination)) echo $pagination; ?>
	</aside>
</section>