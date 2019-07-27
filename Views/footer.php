<!--END SIDEBAR-->
<!--BEGIN USER NAV-->
<footer class="footer mt-auto">
	<div class="copyright bg-white">
		<p>
			2019 Copyright RP-Route68, Made by Om4n3k.
		</p>
	</div>
</footer>
</div>
<div class="right-sidebar">
	<div class="btn-right-sidebar-toggler">
		<i class="mdi mdi-chevron-left"></i>
	</div>
	<!-- Nav Right -->
	<div class="right-nav-container">
		<ul class="nav nav-right-sidebar">
			<li class="nav-item">
				<a class="nav-link text-primary icon-sm" href="<?=$this->base_path?>ticket/create" data-toggle="tooltip" data-placement="left" title="" data-original-title="Stwórz ticket">
					<i class="mdi mdi-bell-plus"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
<?php foreach($this->js as $value):?>
<script src="<?=$value?>"></script>
<?php endforeach?>
</body>

</html>