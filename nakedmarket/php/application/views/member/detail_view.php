<div class="main_content">
	<div class="main_title">
		<h3>
			Welcome
		</h3>
		<p>
			歡迎來信詢問任何訂單、商品及帳戶問題
		</p>
		<a href="mailto:nakedmarket.tw@gmail.com">nakedmarket.tw@gmail.com</a>
	</div>
	<div class="m_data">
		<div class="m_title">
			<p>
				我的帳戶
			</p>
		</div>
		<div class="top_div">
			<div class="edit_btn" <?php echo ($member["username"]==""||$member["address"]==""||$member["mobile"]==""||$member["phone"]=="")?"style='display:none;'":"" ?>>
				<p>
					編輯我的帳戶資料
				</p>
			</div>
			<div class="m_email">
				<span><?php echo $member["email"]; ?></span>
			</div>
			<div class="logout_btn">
				<a href="<?php echo SITE_URL; ?>member/logout">登出</a>
			</div>
		</div>
		<div class="all_data">
			<div class="defaul_div" <?php echo ($member["username"]==""||$member["address"]==""||$member["mobile"]==""||$member["phone"]=="")?"style='display:none;'":"" ?>>
				<div class="d_title" >
					會員資料
				</div>
				<ul>
					<li class="username">
						<span><?php echo $member["username"]; ?></span>
					</li>
					<li class="address">
						<span><?php echo $member["address"];?></span>
					</li>
					<li class="phone">
						<p>
							<?php echo $member["phone"];?>
						</p>
						<p>
							<?php echo $member["mobile"];?>
						</p>
					</li>
				</ul>
			</div>
			<div class="edit_div" <?php echo ($member["username"]==""||$member["address"]==""||$member["mobile"]==""||$member["phone"]=="")?"style='display:block;'":"" ?>>
				<div class="edit_close"></div>
				<form class="edit_form" id="edit_form" method="post" action="<?php echo SITE_URL; ?>member/edit_save">
					<?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
					<label class="username">
						<span>姓名</span>
						<input name="username" type="text" value="<?php echo $member["username"]; ?>"/>
					</label>
					<label class="email">
						<span>電子郵件</span>
						<input name="email" type="text" value="<?php echo $member["email"]; ?>"/>
					</label>
					<label class="phone">
						<span>家用電話</span>
						<input name="phone" type="text" value="<?php echo $member["phone"]; ?>"/>
					</label>
					<label class="mobile">
						<span>手機號碼</span>
						<input name="mobile" type="text" value="<?php echo $member["mobile"]; ?>"/>
					</label>
					<label class="pass">
						<span>修改密碼</span>
						<input name="password" type="password" />
					</label>
					<label class="pass2">
						<span>確認密碼</span>
						<input name="password2" type="password" />
					</label>
					<label class="address">
						<span>寄送地址</span>
						<input name="address" type="text"  value="<?php echo $member["address"]; ?>"/>
					</label>
					<input class="save_btn" type="submit" value="儲存">
				</form>
			</div>
		</div>
	</div>
	<div class="order_list">
		<div class="m_title">
			<p>
				購買紀錄
			</p>
		</div>
		<div class="top_div">
			<div class="item i_title">
				<div>
					<p>
						訂單編號
					</p>
				</div>
				<div>
					<p>
						訂購時間
					</p>
				</div>
				<div>
					<p>
						商品名稱
					</p>
				</div>
				<div>
					<p>
						數量
					</p>
				</div>
				<div>
					<p>
						金額
					</p>
				</div>
				<div>
					<p>
						運費
					</p>
				</div>
				<div>
					<p>
						訂單總價
					</p>
				</div>
			</div>
			<ul>
				<?php if (count($orders)>0): ?>
					<?php for($i=0;$i<3;$i++): ?>
						<?php if (isset($orders[$i])): ?>
							<li>
								<div class="state <?php echo $state_class[$orders[$i]["state"]];?>">
									<span><?php echo $orders[$i]["state"]; ?></span>
									<?php if($orders[$i]["cvs_no"]!=""):?>
										<p><?php echo $orders[$i]["cvs_no"];?></p>
									<?php endif; ?>
								</div>
								<div class="item">
									<div>
										<p>
											<?php echo $orders[$i]["order_no"] ?> 
										</p>
									</div>
									<div>
										<p>
											<?php echo date("Y/m/d H:i",strtotime($orders[$i]["create_date"])) ?>
										</p>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo $p["product_name"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo $p["qty"].$p["unit_text"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo "＄".$p["total"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<p>
											<?php echo $orders[$i]["ship_type"]; ?>
										</p>
										<p>
											<?php echo ($orders[$i]["ship"]==0)?"免運":"$".$orders[$i]["ship"][""]; ?>
										</p>
									</div>
									<div>
										<p>
											<?php echo "＄".$orders[$i]["total"]; ?>
										</p>
									</div>
								</div>
							</li>
						<?php endif; ?>
					<?php endfor; ?>
				<?php endif; ?>
			</ul>
			<?php if (count($orders)>3): ?>
				<div class="more_div">
					<div class="more_btn">
						<span>MORE</span>
					</div>
					<ul>
						<?php for($i = 3;$i<count($orders);$i++): ?>
							<li>
								<div class="state <?php echo $state_class[$orders[$i]["state"]];?>">
									<span><?php echo $orders[$i]["state"]; ?></span>
									<?php if($orders[$i]["cvs_no"]!=""):?>
										<p><?php echo $orders[$i]["cvs_no"];?></p>
									<?php endif; ?>
								</div>
								<div class="item">
									<div>
										<p>
											<?php echo $orders[$i]["order_no"] ?> 
										</p>
									</div>
									<div>
										<p>
											<?php echo date("Y/m/d H:i",strtotime($orders[$i]["create_date"])) ?>
										</p>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo $p["product_name"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo $p["qty"].$p["unit_text"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<?php foreach ($orders[$i]["products"] as $p): ?>
											<p><?php echo "＄".$p["total"] ?></p>
										<?php endforeach; ?>
									</div>
									<div>
										<p>
											<?php echo $orders[$i]["ship_type"]; ?>
										</p>
										<p>
											<?php echo ($orders[$i]["ship"]==0)?"免運":"$".$orders[$i]["ship"]; ?>
										</p>
									</div>
									<div>
										<p>
											<?php echo "＄".$orders[$i]["total"]; ?>
										</p>
									</div>
								</div>
							</li>
						<?php endfor; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="order_list">
		<div class="m_title">
			<p>
				料理教室
			</p>
		</div>
		<div class="top_div">
			<div class="item2 i_title">
				<div>
					<p>
						訂單編號
					</p>
				</div>
				<div>
					<p>
						訂購時間
					</p>
				</div>
				<div>
					<p>
						商品名稱
					</p>
				</div>
				<div>
					<p>
						金額
					</p>
				</div>
			</div>
			<ul>
				<?php if (count($c_orders)>3): ?>
					<?php for($i=0;$i<3;$i++): ?>
						<?php if (isset($c_orders[$i])): ?>
							<li>
								<div class="state <?php echo $state_class[$c_orders[$i]["state"]];?>">
									<span><?php echo $c_orders[$i]["state"] ?></span>
								</div>
								<div class="item2">
									<div>
										<p>
											<?php echo $c_orders[$i]["order_no"]; ?> 
										</p>
									</div>
									<div>
										<p>
											<?php echo date("Y/m/d H:i",strtotime($c_orders[$i]["create_date"])) ?>
										</p>
									</div>
									<div>
										<p>
											<?php echo $c_orders[$i]["classes_name"]; ?>  
										</p>
									</div>
									<div>
										<p>
											<?php echo "＄".$c_orders[$i]["total"];?>
										</p>
									</div>
								</div>
							</li>
						<?php endif; ?>
					<?php endfor; ?>
				<?php endif; ?>
			</ul>
			<?php if (count($c_orders)>3): ?>
				<div class="more_div">
					<div class="more_btn">
						<span>MORE</span>
					</div>
					<ul>
						<?php for($i=3;$i<count($c_orders);$i++): ?>
							<li>
								<div class="state <?php echo $state_class[$c_orders[$i]["state"]];?>">
									<span><?php echo $c_orders[$i]["state"] ?></span>
								</div>
								<div class="item2">
									<div>
										<p>
											<?php echo $c_orders[$i]["order_no"]; ?> 
										</p>
									</div>
									<div>
										<p>
											<?php echo date("Y/m/d H:i",strtotime($c_orders[$i]["create_date"])) ?>
										</p>
									</div>
									<div>
										<p>
											<?php echo $c_orders[$i]["classes_name"]; ?>  
										</p>
									</div>
									<div>
										<p>
											<?php echo "＄".$c_orders[$i]["total"];?>
										</p>
									</div>
								</div>
							</li>
						<?php endfor; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>