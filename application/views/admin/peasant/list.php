<section>
	<h2><strong style="color:grey;">民工管理</strong></h2>
	<div class="page_title">
		<input type="text" class="textbox" placeholder="请输入民工姓名"/>
		<input type="text" class="textbox" placeholder="手机号码."/>
		<select class="select">
			<option>性别</option>
			<option>男</option>
			<option>女</option>
		</select>
		<input type="button" value="搜索" class="group_btn fa-search"/>
		<input type="button" value="全部显示" class="group_btn"/>
		<a class="fr top_rt_btn" href="/admin/peasant/add">添加民工</a>
	</div>
	<table class="table">
		<thead>
		<th>序号</th>
		<th>姓名</th>
		<th>手机号码</th>
		<th>年龄</th>
		<th>性别</th>
		<th>工种</th>
		<th>年龄</th>
		<th>操作</th>
		</thead>
		<tbody>
		<?php if (!empty($list)): ?>
			<?php foreach ($list as $key => $value): ?>
				<tr>
					<td><?php echo $key + 1 ?></td>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $value['age'] ?></td>
					<td><?php echo $value['sex'] ?></td>
					<td><?php echo $value['profession'] ?></td>
					<td><?php echo $value['working_age'] ?></td>
					<td><a href="/admin/peasant/edit/<?php echo $value['id']; ?>">编辑</a></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
	<aside class="paging">
		<?php if (!empty($pagination)) echo $pagination; ?>
	</aside>
</section>