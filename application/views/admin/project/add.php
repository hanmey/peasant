<section>
	<h2><strong style="color:grey;">添加工人</strong></h2>
	<ul class="ulColumn2">
		<li>
			<span class="item_name" style="width:120px;">姓名：</span>
			<input type="text" class="textbox textbox_295" placeholder="姓名"/>
			<span class="errorTips">请输入工人姓名...</span>
		</li>
		<li>
			<span class="item_name" style="width:120px;">学历：</span>
			<select class="select" name="edu">
				<option>请选择工人学历</option>
				<option value="初中以下">初中以下</option>
				<option value="高中">高中</option>
				<option value="大专">大专</option>
				<option value="本科">本科</option>
				<option value="本科以上">本科以上</option>
			</select>
			<span class="errorTips">请选择工人学历</span>
		</li>
		<li>
			<span class="item_name" style="width:120px;">性别：</span>
			<label class="single_selection"><input type="radio" name="sex" value="男"/>男</label>
			<label class="single_selection"><input type="radio" name="name" value="女"/>女</label>
		</li>
		<li>
			<span class="item_name" style="width:120px;">特长：</span>
			<textarea placeholder="本人特长，不超过200个字。。。。。。" class="textarea" style="width:500px;height:100px;"></textarea>
		</li>
		<li>
			<span class="item_name" style="width:120px;">上传图片：</span>
			<label class="uploadImg">
				<input type="file"/>
				<span>上传图片</span>
			</label>
		</li>
		<li>
			<span class="item_name" style="width:120px;"></span>
			<input type="submit" class="link_btn"/>
		</li>
	</ul>
</section>