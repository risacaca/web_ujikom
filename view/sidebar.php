<?php 
$getUrl=$_SERVER['REQUEST_URI']; 
$aktif="active";
$nonaktif="";

?>

<div class="sidebar">
	<div class="sidebar-background"></div>
	<div class="sidebar-wrapper scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="../assets/img/golangs.png" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a>
						<span>
							<?php echo $_SESSION['nama']; ?>
							<span class="user-level"><?php echo $_SESSION['no_identitas']; ?></span>
							<!-- <span class="caret"></span> -->
						</span>
					</a>
					<div class="clearfix"></div>
				</div>
			</div>
			<?php if ($_SESSION['role']=='Admin') : ?>
				<ul class="nav">
				<?php if ($getUrl=="/admin/home") { echo"<li class='nav-item active'>";}else{ echo"<li class='nav-item'>";}?>
					<a href="home">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<!-- <span class="badge badge-count">5</span> -->
					</a>
				</li>
				<?php if ($getUrl=="/admin/barang" || $getUrl=="/admin/users") { echo"<li class='nav-item active submenu'>";}else{ echo"<li class='nav-item'>";}?>
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-layer-group"></i>
						<p>Master </p>
						<span class="caret"></span>
					</a>
					<?php if ($getUrl=="/admin/barang" || $getUrl=="/admin/users") { echo"<div class='collapse show' id='base'>";}else{ echo"<div class='collapse' id='base'>";}?>
						<ul class="nav nav-collapse">
							<!-- <li class="active"> -->
							<?php if ($getUrl=="/admin/barang") { echo"<li class='active'>";}else{ echo"<li>";}?>
								<a href="barang">
									<span class="sub-item ">Barang</span>
								</a>
							</li>
							<?php if ($getUrl=="/admin/users") { echo"<li class='active'>";}else{ echo"<li>";}?>
								<a href="users">
									<span class="sub-item">Users</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Peminjaman</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="../admin/peminjaman">
									<span class="sub-item">Daftar Peminjaman</span>
								</a>
							</li>

						</ul>
					</div>
				</li>
			</ul>
			<?php else: ?>
				<!-- user -->
				<ul class="nav">
				<?php if ($getUrl=="/user") { echo"<li class='nav-item active'>";}else{ echo"<li class='nav-item'>";}?>
					<a href="/user">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php if ($getUrl=="/admin/barang" || $getUrl=="/user/barang") { echo"<li class='nav-item active submenu'>";}else{ echo"<li class='nav-item'>";}?>
					<a href="/user/barang.php">
						<i class="fas fa-layer-group"></i>
						<p>Barang</p>
					</a>
					<?php if ($getUrl=="/admin/barang" || $getUrl=="/admin/users") { echo"<div class='collapse show' id='base'>";}else{ echo"<div class='collapse' id='base'>";}?>
						<ul class="nav nav-collapse">
							<!-- <li class="active"> -->
							<?php if ($getUrl=="/admin/barang") { echo"<li class='active'>";}else{ echo"<li>";}?>
								<a href="barang">
									<span class="sub-item ">Barang</span>
								</a>
							</li>
							<?php if ($getUrl=="/admin/users") { echo"<li class='active'>";}else{ echo"<li>";}?>
								<!-- <a href="users">
									<span class="sub-item">Users</span>
								</a> -->
							</li>
						</ul>
					</div>
				</li>
			</ul>
				<?php endif; ?>
		</div>
	</div>
</div>