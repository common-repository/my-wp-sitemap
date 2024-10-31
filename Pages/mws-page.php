<?php

$Get_Sitemap = new mws_Get_Sitemap();
$site_all_pages = $Get_Sitemap->get_results();
$get_hierarchy_level_1 = $Get_Sitemap->get_hierarchy_level_1();
?>
<div class="mws">
	<div class="inner">
		<h1 class="mws__title">サイトマップ</h1>

		<table class="mws__table">
			<tr class="mws__tr">
				<?php
				$get_sitemap_head_array = $Get_Sitemap->get_sitemap_head();

				foreach ($get_sitemap_head_array as $get_sitemap_key => $get_sitemap_heads) {
					$col_span = count($get_sitemap_heads);
				?>
					<th class="mws__th" nowrap colspan="<?php echo esc_attr($col_span) ?>">
						<?php echo esc_html($get_sitemap_key) ?>
					</th>
				<?php } ?>
			</tr>

			<?php
			$auto_crement_id = 0;
			foreach ($site_all_pages as $site_all_page) {
				++$auto_crement_id;
			?>
				<tr class="mws__tr">
					<td class="mws__td">
						<?php echo esc_html($auto_crement_id) ?>
					</td>

					<?php
					$i = 0;
					while ($i < $get_hierarchy_level_1) {

					?>
						<td class="mws__td" nowrap>
							<?php
							$title = esc_html($site_all_page['title']['title' . $i]);
							echo esc_html($title);
							 ?>
						</td>
					<?php
						++$i;
					} ?>
					<td class="mws__td">
						<?php echo esc_html($site_all_page['slug']['slug0']) ?>
					</td>
					<td class="mws__td">
						<?php echo esc_url($site_all_page['url']['url0']) ?>
					</td>
					<td class="mws__td">
						<?php
						$template_file_url = $site_all_page['template_file']['template_file_url'];
						$template_file_path = $site_all_page['template_file']['template_file_path'];
						$template_file_name = $site_all_page['template_file']['template_file_name'];


						if ($Get_Sitemap->file_checker($template_file_path)) {
							$href = 'href=' . esc_url($template_file_url) ;
						} else {
							$href = null;
						}
							?>
							<a <?php echo esc_attr($href) ?> target="_blank" rel="noopener">
								<?php echo esc_html($template_file_name) ?>
							</a>
					</td>
				</tr>

			<?php } ?>
		</table>
	</div>
</div>
